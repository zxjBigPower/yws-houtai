@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>知识堂管理
        <span class="c-gray en">&gt;</span> 知识堂列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <div class="page-container">
        <div class="Hui-article">
        <div class="mt-20">
            <article class="cl pd-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="80">ID</th>
                    <th>标题</th>
                    <th>封面</th>
                    <th width="120">更新时间</th>
                    <th width="60">发布状态</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($knows as $val)
                <tr class="text-c">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td><img style="height: 50px;" src="{{ asset($val->pic) }}" alt=""></td>
                    <td>{{ $val->createtime }}</td>
                    <td class="td-status">
                        @if($val->status==1)
                            <span class="label label-success radius" onClick="new_stop(this,'{{ $val->id }}')">已发布</span>
                        @else
                            <span class="label label-defaunt radius" onClick="new_start(this,'{{ $val->id }}')">已下架</span>
                        @endif
                    </td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" href="{{ url('admin/knowedit?id='.$val->id) }}" title="编辑">
                            <i class="Hui-iconfont">&#xe6df;</i>
                        </a>
                        <a style="text-decoration:none" class="ml-5" onClick="new_del(this,'{{ $val->id }}')" href="javascript:;" title="删除">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
                </article>
        </div>
        </div>
    </div>
    </section>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{ asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script type="text/javascript">

        /*资讯-删除*/
        function new_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                var ids = "{{ url('admin/service/knowdel?id=') }}"+id;
                $.ajax({
                    type: 'get',
                    url: ids,
                    dataType: 'json',
                    success: function(data){
                        if (data.status==1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                        }
                    },
                    error:function() {
                    }
                });
            });
        }

        /*资讯-下架*/
        function new_stop(obj,id){
            layer.confirm('确认要下架吗？',function(index){
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:'{{ url('admin/service/knowstop') }}',
                    data:{id:id},
                    success:function (data){
                        console.log(data);
                        if(data.status==1){
//                            alert(data.status);
                            htmls = '<span class="label label-defaunt radius" onClick="new_start(this,'+id+')">已下架</span>';
                            $(obj).parents("tr").find(".td-status").html(htmls);
                            $(obj).remove();
                            layer.msg('已下架!',{icon: 5,time:1000});
                        }
                    },
                    error:function (msg){
                        console.log(msg);
                    }

                });


            });
        }

        /*资讯-发布*/
        function new_start(obj,id){
            layer.confirm('确认要发布吗？',function(index){
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:'{{ url('admin/service/knowstop') }}',
                    data:{id:id},
                    success:function (data){
                        if(data.status==1){
                            htmls = '<span class="label label-success radius" onClick="new_stop(this,'+id+')">已发布</span>';
                            $(obj).parents("tr").find(".td-status").html(htmls);
                            $(obj).remove();
                            layer.msg('已发布!',{icon: 6,time:1000});
                        }
                    },
                    error:function (msg){
//                        alert(111111);
                        console.log(msg);
                    }
                });
            });
        }
    </script>
@endsection