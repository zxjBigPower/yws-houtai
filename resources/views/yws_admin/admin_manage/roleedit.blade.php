@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="Hui-article">
            <article class="cl pd-20" style="width: 50%;margin: 0 auto;margin-top: 50px;">
                <div class="cl pd-5 bg-1 bk-gray"> <span class="l">  <a class="btn btn-primary radius" href="{{ url('admin/roleadd') }}" ><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
                <div class="mt-10">
                    <table class="table table-border table-bordered table-hover table-bg">
                        <thead>
                        <tr>
                            <th scope="col" colspan="6">角色管理</th>
                        </tr>
                        <tr class="text-c">

                            <th width="40">ID</th>
                            <th width="200">角色名</th>
                            <th>用户列表</th>
                            <th width="300">描述</th>
                            <th width="70">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-c">

                            <td>1</td>
                            <td>超级管理员</td>
                            <td><a href="#">admin</a></td>
                            <td>拥有至高无上的权利</td>
                            <td class="f-14"><a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','admin-role-add.html','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </article>
        </div>
    </section>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script type="text/javascript">
        /*管理员-角色-添加*/
        function admin_role_add(title,url,w,h){
            layer_show(title,url,w,h);
        }
        /*管理员-角色-编辑*/
        function admin_role_edit(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        /*管理员-角色-删除*/
        function admin_role_del(obj,id){
            layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……


                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            });
        }
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
@endsection