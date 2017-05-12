<?php

namespace App\Http\Controllers\Home;

use App\ajaxModel;
use App\HomeModel\yws_user;
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
}
