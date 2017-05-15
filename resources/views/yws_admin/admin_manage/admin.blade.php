@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
        {{--面包屑--}}
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            管理员管理
            <span class="c-gray en">&gt;</span>
            管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                    <span class="l">
                        <a href="{{ url('admin/adminadd') }}" class="btn btn-primary radius">
                            <i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
                    </span>
                    <span class="r">共有数据：<strong>{{ $sum }}</strong> 条</span>
                </div>
                <table class="table table-border table-bordered table-bg">
                    <thead>
                    <tr>
                        <th scope="col" colspan="9">员工列表</th>
                    </tr>
                    <tr class="text-c">
                        <th width="40">ID</th>
                        <th width="150">登录名</th>
                        <th width="90">手机</th>
                        <th width="150">邮箱</th>
                        <th>角色</th>
                        <th width="130">加入时间</th>
                        <th width="100">是否已启用</th>
                        <th width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin )
                        <tr class="text-c">
                        <td>{{ $admin['id'] }}</td>
                        <td>{{ $admin['name'] }}</td>
                        <td>{{ $admin['phone'] }}</td>
                        <td>{{ $admin['email'] }}</td>
                        <td>{{ $admin['role_name'] }}</td>
                        <td>{{ $admin['created_at'] }}</td>

                        @if($admin['stop']==1)
                        <td class="td-status">
                            <span class="label label-success radius" style="cursor:pointer;" onClick="admin_stop(this,{{ $admin['id']  }})">已启用</span>
                        </td>


                        @else
                        <td class="td-status">
                            <span class="label label-default radius" style="cursor:pointer;" onClick="admin_start(this,{{ $admin['id']  }})">已禁用</span>
                        </td>
                        @endif
                            <td class="td-manage">
                            <a title="编辑" href="{{ url('admin/adminedit?id='.$admin['id']) }}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a title="删除" href="javascript:;" onclick="admin_del(this,'{{ $admin['id']  }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
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

        /*管理员-删除*/
        function admin_del(obj,id){

            layer.confirm('确认要删除吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/admindel') }}',
                    success:function (data){

                        if(data==1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                        }
                    },
                    error:function (error){
                        console.log(error);
                    }
                });

            });
        }

        /*管理员-停用*/
        function admin_stop(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/adminstop') }}',
                    success:function (data){
                        var htmls = '<span class="label label-default radius" onClick="admin_start(this,'+data+')">已禁用</span>';
                            $(obj).parents("tr").find(".td-status").html(htmls);
                            $(obj).remove();
                            layer.msg('已停用!',{icon: 5,time:1000});
                    },
                    error:function (error){
                        console.log(error);
                    }
                });
            });
        }

        /*管理员-启用*/
        function admin_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/adminstop') }}',
                    success:function (data){
                            var thmls = '<span class="label label-success radius" onClick="admin_stop(this,'+data+')">已启用</span>';
                        $(obj).parents("tr").find(".td-status").html(thmls);
                            $(obj).remove();
                            layer.msg('已启用!', {icon: 6,time:1000});
                    },
                    error:function (error){
                        console.log(error);
                    }
                });


            });
        }
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
@endsection