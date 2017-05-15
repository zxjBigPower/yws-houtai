@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 权限管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <table class="table table-border table-bordered table-bg">
                    <thead>
                    <tr>
                        <th scope="col" colspan="7">权限节点</th>
                    </tr>
                    <tr class="text-c">
                        <th width="40">ID</th>
                        <th width="200">权限名称</th>
                        <th>描述</th>
                        <th>路由</th>
                        <th width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $val)
                    <tr class="text-c">
                        <td>{{ $val['id'] }}</td>
                        <td>{{ $val['name'] }}</td>
                        <td>{{ $val['desc'] }}</td>
                        <td>{{ $val['route'] }}</td>
                        <td>
                            <a title="编辑" href="{{url('admin/permissionedit?id='.$val['id'] )}}"  class="ml-5" style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6df;</i>
                            </a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </div>

    </section>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script type="text/javascript">
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
@endsection