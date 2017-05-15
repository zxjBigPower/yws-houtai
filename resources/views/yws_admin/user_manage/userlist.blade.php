@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('css')

    <style>
        #pagebox{
            display: inline-block;
        }
    </style>

@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
        {{--面包屑--}}
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            用户管理
            <span class="c-gray en">&gt;</span>
            用户列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                    {{--<div class="search-wp">--}}
                    {{--<span class="icon say-combine fangda" ></span>--}}
                    {{--<form id="sfrom">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<input type="text" placeholder="名称或型号" name='search' id="search">--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    <span class="r">共有数据：<strong id="r">{{ $num }}</strong> 条</span>
                </div>
                <div style="height:350px;">
                    <table class="table table-border table-bordered table-bg">
                        <thead>
                        <tr>
                            <th scope="col" colspan="8">用户列表</th>
                        </tr>
                        <tr class="text-c">
                            <th width="40">ID</th>
                            <th width="150">账号</th>
                            <th width="90">email</th>
                            <th width="90">注册时间</th>
                            <th width="100">状态</th>
                        </tr>
                        </thead>

                        <tbody id="tb">

                        @forelse($users as $user)
                            <tr class="text-c">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                @if($user->is_login==1)
                                    <td class="td-status">
                                        <span class="label label-success radius" style="cursor:pointer;" onClick="blog_stop(this,{{ $user->id  }})">允许登录</span>
                                    </td>
                                @else
                                    <td class="td-status">
                                        <span class="label label-default radius" style="cursor:pointer;" onClick="blog_start(this,{{ $user->id }})">禁止登录</span>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <th scope='col' style="text-align: center" colspan='8'>暂无用户</th>
                        @endforelse

                        </tbody>

                    </table>
                </div>
                <div id="pagebox">
                    <!-- 第一部分 -->

                    {{ $users->links('vendor/pagination/blogpage') }}
                </div>
            </article>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script>
        /*用户下线*/
        function blog_stop(obj,id){
            layer.confirm('确认要禁止此用户登录吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
//                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/is_login') }}',
                    success:function (data){
//                        alert(11);
                        if(data==1){
                            var htmls = '<span class="label label-default radius" onClick="blog_start(this,'+id+')">禁止登录</span>';
                            $(obj).parents("tr").find(".td-status").html(htmls);
                            $(obj).remove();
                            layer.msg('已禁止!',{icon: 5,time:1000});
                        }

                    },
                    error:function (error){
                        alert(22);
                        console.log(error);
                    }
                });
            });
        }
        /*用户-上线*/
        function blog_start(obj,id){
            layer.confirm('确认允许登录吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                var csrf = '{{csrf_token()}}';
                $.ajax({
                    type:'post',
                    dataType:'json',
                    data:{'_token':csrf,id:id},
                    url:'{{ url('admin/service/is_login') }}',
                    success:function (data){
                        if(data==1){
                            var thmls = '<span class="label label-success radius" onClick="blog_stop(this,'+id+')">允许登录</span>';
                            $(obj).parents("tr").find(".td-status").html(thmls);
                            $(obj).remove();
                            layer.msg('已允许!', {icon: 6,time:1000});
                        }

                    },
                    error:function (error){
                        console.log(error);
                    }
                });


            });
        }
        /*用户-删除*/
        function admin_del(obj,id){

            layer.confirm('确认要删除吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/goodsdel') }}',
                    success:function (data){
                        if(data==1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                            var val = $('#r').text()*1;
                            var sum  = val-1;
                            if(sum<0){
                                sum = 0;
                            }
                            $('#r').html(sum);
                        }
                    },
                    error:function (error){
                        console.log(error);
                    }
                });

            });
        }
    </script>
@endsection
<!--/请在上方写此页面业务相关的脚本-->
