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
        $news = DB::table('yws_news')->select()->orderBy('updated_time','decs')->get()->toArray();
        return view('yws_admin.new_manage.new',compact('news'));
    }

    //显示添加页面
    public function articleAdd()
    {
        $types = DB::table('yws_newstype')->get();
        return view('yws_admin.new_manage.newadd',compact('types'));
    }

    //添加文庄
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
    //分类列表
    public function fenlei()
    {
        $types = DB::table('yws_newstype')->orderBy('orderly','desc')->get();
        return view('yws_admin.new_manage.fenlei',compact('types'));
    }

    //排序分类
    public function doFenleiOrderly(Request $request)
    {
        $id = $request->id;
        $data['orderly'] = $request->orderly;
        $res = DB::table('yws_newstype')->where('id',$id)->update($data);
        if($data){
            return json_encode(['status'=>200,'msg'=>'success']);
        }
        return json_encode(['status'=>400,'msg'=>'falid']);
    }

    //添加分类
    public function doFenleiAdd(Request $request)
    {
        $fenlei=$request->fenlei;
        $rep = DB::table('yws_newstype')->where('type',$fenlei)->get()->toArray();
        if($rep){
            return json_encode(['status'=>200,'msg'=>'分类已经存在']);
        }
        $res = DB::table('yws_newstype')->insertGetId([
            'type'=>$fenlei
        ]);

        $html = <<<STR
<tr class="text-c">
   <td>$res</td>
   <td>$fenlei</td>
   <td class="td-status1">
       <input type="number" name="orderly" value="1" onblur="orderly(this,$res)">
   </td>
   <td class="f-14 td-manage">
       <a style="text-decoration:none" class="ml-5" onClick="new_del(this,$res)" href="javascript:;" title="删除">
            <i class="Hui-iconfont">&#xe6e2;</i>
       </a>
   </td>
</tr>
STR;

        if($res){
            return json_encode(['status'=>200,'msg'=>'添加成功','tr'=>$html]);
        }
        return json_encode(['status'=>500,'msg'=>'falid']);
    }

    //删除分类
    public function doFenleiDel(Request $request)
    {
        $id = $request->id;
        $res = DB::table('yws_newstype')->where('id',$id)->delete();
        return json_encode(['status'=>200,'msg'=>'success']);
    }

    //删除文章
    public function doArticleDel(Request $request)
    {
        $id = $request->id;
        $res = DB::table('yws_news')->where('id',$id)->delete();
        if($res){
            return json_encode(['status'=>1,'msg'=>"成功"]);
        }
        return json_encode(['status'=>1,'msg'=>"错误"]);
    }


    //上下线文章
    public function doArticleLine(Request $request)
    {
        $id = $request->id;
        $sta = DB::table('yws_news')->find($id);
        //$sta1 = DB::table('yws_news')->where('id',$id)->pluck('is_online');
        //dd($sta,$sta1);
        $sta = ($sta->is_online==1)? 0 : 1 ;
        $res = DB::table('yws_news')->where('id',$id)->update(['is_online'=>$sta]);
        if($res){
            return json_encode(['status'=>1,'msg'=>"成功"]);
        }
        return json_encode(['status'=>1,'msg'=>"错误"]);
    }

    //审核文章
    public function doArticleCheck(Request $request)
    {
        $id = $request->id;
        $sta = DB::table('yws_news')->find($id);
        //$sta1 = DB::table('yws_news')->where('id',$id)->pluck('is_online');
        //dd($sta,$sta1);
        $sta = ($sta->is_pass==1)? 0 : 1 ;
        $res = DB::table('yws_news')->where('id',$id)->update(['is_pass'=>$sta]);
        if($res){
            return json_encode(['status'=>1,'msg'=>"成功"]);
        }
        return json_encode(['status'=>1,'msg'=>"错误"]);
    }
}
