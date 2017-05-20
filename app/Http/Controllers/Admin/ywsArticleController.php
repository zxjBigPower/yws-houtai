<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ywsArticleController extends Controller
{
    //文章列表
    public function articleList()
    {
        return view('yws_admin.new_manage.new');
    }

    //显示添加页面
    public function articleAdd()
    {
        return view('yws_admin.new_manage.newadd');
    }

    public function doArticleAdd(Request $request)
    {
        //dd($request->all());
        $data['title'] = $request->newstitle;
        $data['content'] = $request->editorValue;
        $data['fenlei'] = (string)$request->fenlei;
        $data['admin_id'] = session('ywsadmin.user')->id;

        $file = $request->file('img');
        // 文件是否上传成功
        if ($file->isValid()) {
            // 获取文件相关信息
            //$originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            //$realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg

            //定义文件上传类型
            $arr = ['image/jpeg','image/png','image/gif'];
            if(!in_array($type,$arr)){
                return json_encode(['status'=>400,'msg'=>'上传文件不是允许类型']);
            }
            // 上传文件
            $filename = date('YmdHis') . '-' . uniqid() . '.' . $ext;
            $res = $file->move('fileupload/news/newsimgs',$filename);
            //dd($res);
            $data['cover'] = 'fileupload/news/newsimgs'.$filename;
            $data['created_time']=date('Y-m-d H:i:s');
            $data['updated_time']=date('Y-m-d H:i:s');
            $db = DB::table('yws_news')->insert($data);
            if($db){
                return json_encode(['status'=>200,'msg'=>'添加成功']);
            }else{
                return json_encode(['status'=>'400','msg'=>'填写错误']);
            }

        }else{
            return json_encode(['status'=>400,'msg'=>'文件上传失败']);
        }
    }

    public function doFenleiAdd(Request $request)
    {
        $fenlei=$request->fenlei;
        dd($fenlei);
    }
}
