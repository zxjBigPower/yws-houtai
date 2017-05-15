@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('css')

    <style>
        .search-wp{
            /*margin-top:10px;*/
            width:390px;
            height:40px;
            margin:5px auto;
            position:relative;
        }
        .search-wp input{
            width: 390px;
            vertical-align: middle;
            height: 40px;
            padding: 0 10px 0 50px;
            font-size: 18px;
            color:grey;
        }
        .search-wp .say-combine {
            display: inline-block;
            margin: 3px 7px;
            width: 19px;
            height: 19px;
            position: absolute;
            z-index: 36;
            left: 10px;
            top: 10px;
            background: url('{{ url('index/images/nav_img/nav_3_img/say-combine.png') }}');
        }
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
            博客管理
            <span class="c-gray en">&gt;</span>
            博客列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
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
                            <th scope="col" colspan="8">博客列表</th>
                        </tr>
                        <tr class="text-c">
                            <th width="40">ID</th>
                            <th width="150">博客标题</th>
                            <th width="90">发表人</th>
                            <th width="150">基本内容</th>
                            <th width="100">发表时间</th>
                            <th width="30">举报</th>
                            <th width="100">操作</th>
                            <th width="40">详情</th>
                        </tr>
                        </thead>

                        <tbody id="tb">

                        @forelse($blogs as $blog)
                            <tr class="text-c">
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->name }}</td>
                                <td>{{  mb_substr(strip_tags($blog->content),0,50).'...' }}</td>
                                <td>{{ $blog->addtime }}</td>
                                <td>
                                    @if($blog->is_layw==1)
                                        <span class="label label-dangerous radius" style="background: red;">是</span>
                                    @else
                                        <span class="label label-success radius" >否</span>
                                    @endif
                                </td>
                                @if($blog->is_online==1)
                                    <td class="td-status">
                                        <span class="label label-success radius" style="cursor:pointer;" onClick="blog_stop(this,{{ $blog->id  }})">强制下线</span>
                                    </td>
                                @else
                                    <td class="td-status">
                                        <span class="label label-default radius" style="cursor:pointer;" onClick="blog_start(this,{{ $blog->id }})">恢复上线</span>
                                    </td>
                                @endif
                                <td>
                                    <a title="详情" href="{{ url('index/nav_index_bloginfor?id='.$blog->id) }}"  class="ml-5" style="text-decoration:none" target='_blank'><i class="Hui-iconfont">&#xe616;</i></a>
                                </td>
                            </tr>
                        @empty
                            <th scope='col' style="text-align: center" colspan='8'>暂无博客</th>
                        @endforelse

                        </tbody>

                    </table>
                </div>
                <div id="pagebox">
                    <!-- 第一部分 -->

                    {{ $blogs->links('vendor/pagination/blogpage') }}
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
        /*博客下线*/
        function blog_stop(obj,id){
            layer.confirm('确认要强制下线吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
//                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/is_online') }}',
                    success:function (data){
//                        alert(11);
                        if(data==1){
                            var htmls = '<span class="label label-default radius" onClick="blog_start(this,'+id+')">恢复上线</span>';
                            $(obj).parents("tr").find(".td-status").html(htmls);
                            $(obj).remove();
                            layer.msg('已下线!',{icon: 5,time:1000});
                        }

                    },
                    error:function (error){
                        alert(22);
                        console.log(error);
                    }
                });
            });
        }
        /*博客-上线*/
        function blog_start(obj,id){
            layer.confirm('确认允许上线吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                var csrf = '{{csrf_token()}}';
                $.ajax({
                    type:'post',
                    dataType:'json',
                    data:{'_token':csrf,id:id},
                    url:'{{ url('admin/service/is_online') }}',
                    success:function (data){
                        if(data==1){
                            var thmls = '<span class="label label-success radius" onClick="blog_stop(this,'+id+')">强制下线</span>';
                            $(obj).parents("tr").find(".td-status").html(thmls);
                            $(obj).remove();
                            layer.msg('已上线!', {icon: 6,time:1000});
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
