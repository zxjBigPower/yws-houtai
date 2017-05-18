<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;

class ywsAdminController extends Controller
{
    //登录
    public function ywsLogin()
    {
        return view('yws_admin.login');
    }
    //登录验证
    public function ywsDoLogin(Request $request)
    {
        //dd($request->all());
        //验证规则
        $roles = [
            'name' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ];
        //自定义的错误信息
        $msg = [
            'required' => '请填写完整',
            'captcha' => '验证码错误',
        ];
        $this->validate($request,$roles,$msg);
        //$validator = Validator::make($request->all(),$roles,$msg);
        //验证数据
        $admin = $request->name;
        $pass = md5($request->password);
        $res = DB::table('yws_ausers')->where([['name',$admin],['password',$pass]])->get()->toArray();
        //dd($res);
        if($res){
            $request->session()->put('ywsadmin.user',$res[0]);
            return json_encode(['status'=>200,'msg'=>'success']);
        }else{
            return json_encode(['status'=>400,'msg'=>'请输入正确的用户名和密码']);
        }
    }

    //后台首页
    public function ywsIndex()
    {

        $data = 'data';
        return view('yws_admin.index')->with('data',$data);
    }
}
