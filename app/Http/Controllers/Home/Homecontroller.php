<?php

namespace App\Http\Controllers\Home;

use App\ajaxModel;
use App\HomeModel\tmpPhone;
use App\HomeModel\yws_user;
use App\index_tool\SMS\SendTemplateSMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    /*public function __construct(yws_user $user)
    {
        $this->user = $user;
    }*/


    //官网首页
    public function home()
    {
        //获取数据

        $data="data";
        //显示页面
        return view('home.index',compact('data'));
    }

    //登录
    public function login(Request $request)
    {
        $reponse = new ajaxModel();
        if($request->isMethod('post')){
            //验证规则
            $roles = [
            //'captcha' => 'required|between:6,12|alpha_dash',
            'captcha' => 'required|captcha',
            ];
            //自定义的错误信息
            $msg = [
                'required' => '验证码不能为空',
                'captcha'  =>'验证码错误',
            ];
            //验证数据
            $this->validate($request,$roles,$msg);
            //验证用户名和密码
            $uname = $request->uname;
            $pass = md5('ywslz'.$request->pass);
            $res=yws_user::where('username',$uname)
                ->orwhere('phone',$uname)
                ->where('password',$pass)
                ->select('id')
                ->get()->toArray();
            //dd(empty($res),$res);
            if($res){
                $reponse->msg = '登录成功';
                $reponse->status = 200;
                $result = $reponse->tojson();
                if($request->has('auto_login')){
                    cache(['username'=>$request->uname,'pass'=>$pass],1);
                    //cache(['username'=>$request->uname],1);
                    //setcookie();
                    session(['yws_user.uid' => $res]);
                    return $result;
                }else{
                    cache('username',null);
                    session(['yws_user.uid' => $res]);
                    return $result;
                }
            }else{
               $reponse->msg = '请输入正确的用户名和密码';
               $reponse->status = 400;
               return $reponse->tojson();
            }
        }else{
            return view('home.login');
        }

    }

    //注册验证
    public function register(Request $request)
    {
        $reponse = new ajaxModel();
        if($request->isMethod('post')){
            $data = $request->except('_token');
            $res = yws_user::where($data)->get()->toArray();
            if(!$res){
                $reponse->msg = '符合';
                $reponse->status = 200;
                return $result = $reponse->tojson();
            }else{
                $reponse->msg = '不符合';
                $reponse->status = 400;
                return $result = $reponse->tojson();
            }

            dd($data);
        }else{
            return view('home.register');
        }
    }

    //发送手机验证码
    public function sendCode(Request $request)
    {
        //获取返回的数据对象
        $rt_result = new ajaxModel();
        //获取手机号
        $r_phone = $request->phone;
        $phone=str_replace(' ','',$r_phone);
        //定义随机因子
        $charset = '1234567890';
        $phoneMsg = new SendTemplateSMS();
        //随机得到随机因子
        $code = '';
        $len = strlen($charset);
        for ($i = 0; $i < 6; $i++){
            $code .= $charset{mt_rand(0,strlen($len)-1)};
        }
        $rt_result = $phoneMsg->sendMsm($phone,array($code, 5), 1);
        if ($rt_result->status == 0) {
            //获取tmp_phone表模型
            $res = tmpPhone::where('phone',$phone)->get()->toArray();
            if($res){
                tmpPhone::where('phone',$phone)->update(['code'=>$code]);
            }else{
                $tmp_phone = new tmpPhone();
                $tmp_phone->phone = $phone;
                $tmp_phone->code = $code;
                $tmp_phone->deadline = time()+ 5*60;
                $tmp_phone->save();
            }
        }
        return $rt_result->toJson();
    }


    //验证验证码
    public function checkPhoneCode(Request $request)
    {
        $r_phone = $request->phone;
        $phone=str_replace(' ','',$r_phone);
        $tmpline = tmpPhone::where('phone', $phone)->select('deadline')->get();
        dd($tmpline);
        if($tmpline==null){
            return 3;
        }
        $tmpPhone = tmpPhone::where('deadline', $tmpline)->get()->toArray();
//        dd($tmpPhone);
        if ($tmpPhone[0]['code'] == $request->code) {
            if (time() > $tmpPhone[0]['deadline']) {
                return 2;
            }else{
                return 1;
            }
        }else{
            return 3;
        }

    }
}
