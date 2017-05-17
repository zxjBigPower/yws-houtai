<?php

namespace App\Http\Controllers\Home;

use App\ajaxModel;
use App\HomeModel\tmpPhone;
use App\HomeModel\yws_user;
use App\index_tool\SMS\SendTemplateSMS;
use App\Tools\Curl;
use App\Tools\SMS\ALiYuSMS;
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
            $pass = md5('ywsuser'.$request->pass);
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

/*    //发送手机验证码（荣联云）
    public function sendCode(Request $request)
    {
        //获取返回的数据对象
        $rt_result = new ajaxModel();

        //dd($rt_result);
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
                tmpPhone::where('phone',$phone)->update(['code'=>$code,'deadline'=>time()+ 5*60]);
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
*/
    //验证验证码
    public function checkPhoneCode(Request $request)
    {
        $reponse = new ajaxModel();
        $phone = $request->phone;
        //$phone=str_replace(' ','',$r_phone);
        $tmpline = tmpPhone::where('phone', $phone)->select('deadline')->get()->toArray();

        //dd($tmpline);
        $reponse->msg = '验证码错误';
        $reponse->status = 400;
        $res = $reponse->tojson();
        if(!$tmpline){
            return $res;
        }
        $tmpPhone = tmpPhone::where('phone', $phone)->get()->toArray();
        //dd($tmpPhone);
        if ($tmpPhone[0]['code'] == $request->code) {
            if (time() > $tmpPhone[0]['deadline']) {
                $reponse->msg = '验证码已过期';
                $reponse->status = 401;
                return $reponse->tojson();
            }else{
                $reponse->msg = '验证码正确';
                $reponse->status = 200;
                return $reponse->tojson();
            }
        }else{
            return $res;
        }

    }

    //阿里云短信接口
    public function sendCode(Request $request)
    {
        //获取手机号
        $phone = $request->phone;
        //定义随机因子
        $charset = '2468013579';
        //随机得到随机因子
        $code = '';
        $len = strlen($charset);
        for ($i = 0; $i < 4; $i++){
            $code .= $charset{mt_rand(0,strlen($len)-1)};
        }

        $cofig = array (
            'accessKeyId' => 'LTAIKxo1N0hgSWRM',
            'accessKeySecret' => 'ydbCj5YE5TugBr5MN0tvPLPueljwmk',
            'signName' => '云温商',
            'templateCode' => 'SMS_30025162'
        );

        $SMS = new ALiYuSMS($cofig);

        $resoult = json_encode(['status'=>200,'msg'=>'发送成功']);
        //获取tmp_phone表模型
        $res = tmpPhone::where('phone',$phone)->get()->toArray();
        if($res){
            $times= $res[0]['times'];
            $update = time() - strtotime($res[0]['updated_at']);

            if($update<3600*24 && $times>=5){

                return json_encode(['status'=>401,'msg'=>'今日发送次数已达上限']);

            }elseif($update>3600*24 && $times>=5) {
                    // 执行
                    $status = $SMS->send_verify($phone,$code);
                    //$res = array('1'=>1);
                    if($status){
                        tmpPhone::where('phone',$phone)->update([
                            'code'=>$code,
                            'deadline'=>time()+ 5*60,
                            'times'=>1,
                            ]);
                        return $resoult;
                    }else{
                        return json_encode(['status'=>402,'msg'=>$SMS->error]);
                    }
            }else{
                // 执行
                $status = $SMS->send_verify($phone,$code);
                if($status){
                    tmpPhone::where('phone',$phone)->update([
                        'code'=>$code,
                        'deadline'=>time()+ 5*60,
                        'times'=>$times+1,
                    ]);
                    return $resoult;
                }else{
                    return json_encode(['status'=>403,'msg'=>$SMS->error]);
                }
            }
        }else{
            // 执行
            $status = $SMS->send_verify($phone,$code);
            if($status){
                $tmp_phone = new tmpPhone();
                $tmp_phone->phone = $phone;
                $tmp_phone->code = $code;
                $tmp_phone->deadline = time()+ 5*60;
                $tmp_phone->times = 1;
                $tmp_phone->save();
                return $resoult;
            }else{
                return json_encode(['status'=>403,'msg'=>$SMS->error]);
            }
        }
    }

    //完成注册
    public function registerComplete(Request $request)
    {

        $data = $request->only('username','password','phone');
        $data['password'] = md5('ywsuser'.$data['password']);
        $user = yws_user::create($data);

        if($user){
            $res = $user->toArray();
            $request->session()->put('web.user',$res);
            $request->session()->get('web.user');
            return view('home.register-success');
        }else{
            return redirect('home.register');
        }
    }

    //找回密码
    public function getPass(Request $request)
    {
        $respone = new ajaxModel();
        if($request->isMethod('post')){
            $data = yws_user::where('username',$request->name)->orwhere('phone',$request->name)->get()->toArray();
            //dd($data);
            if($data){
               $phone = $data[0]['phone'];
               $rphone = substr_replace($phone,'****',3,4);
               return json_encode(['status'=>200,'msg'=>$rphone,'phone'=>$phone]);
            }else{
                $respone->msg = '该用户不存在';
                $respone->status = 400;
                return $respone->tojson();
            }
        }else{
            return view('home.yws-zhmm');
        }
    }

//    确认修改密码
    public function changPass(Request $request)
    {
        $phone=$request->phone;
        $pass=md5('ywsuser'.$request->password);
        $res = yws_user::where('phone',$phone)->update(['password'=>$pass]);
        if($res){
            return json_encode(['status'=>200,'msg'=>'修改成功']);
        }else{
            return json_encode(['status'=>400,'msg'=>'修改失败']);
        }
    }
}
