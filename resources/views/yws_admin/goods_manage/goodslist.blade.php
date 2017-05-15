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
        #pagebox a{
            display: inline-block;
            font-size: 16px;
            text-align: center;
            line-height: 30px;
            background: #c7ECEF;
            border-radius: 5px;
            color:black;
            width:60px;
            height:30px;
            margin-right: 10px;
        }
        #pagebox a:hover{
            color:blue;
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
            商品管理
            <span class="c-gray en">&gt;</span>
            商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                    <div class="search-wp">
                        <span class="icon say-combine fangda" ></span>
                        <form id="sfrom">
                            {{ csrf_field() }}
                        <input type="text" placeholder="名称或型号" name='search' id="search">
                        </form>
                    </div>
                    <span class="r">共有数据：<strong id="r">{{ $num }}</strong> 条</span>
                </div>
                <div style="height:300px;">
                <table class="table table-border table-bordered table-bg">
                    <thead>
                    <tr>
                        <th scope="col" colspan="8">商品列表</th>
                    </tr>
                    <tr class="text-c">
                        <th width="40">ID</th>
                        <th width="150">商品名称</th>
                        <th width="90">商品型号</th>
                        <th width="90">商品图片</th>
                        <th width="150">基本信息</th>
                        <th width="130">加入时间</th>
                        <th width="100">是否上线</th>
                        <th width="100">操作</th>
                    </tr>
                    </thead>

                    <tbody id="tb">

                    @forelse($goods as $good)
                        <tr class="text-c">
                            <td>{{ $good->id }}</td>
                            <td>{{ $good->type }}</td>
                            <td>{{ $good->model }}</td>
                            <td><img src="{{ asset('fileupload/goods/goodsimgs/'.$good->pic) }}" width="50" style="margin-left: 5px;border-radius: 4px;"></td>
                            <td>{{ $good->descript }}</td>
                            <td>{{ $good->onlinetime }}</td>
                            @if($good->is_store==1)
                                <td class="td-status">
                                    <span class="label label-success radius" style="cursor:pointer;" onClick="admin_stop(this,{{ $good->id  }})">已上线</span>
                                </td>
                            @else
                                <td class="td-status">
                                    <span class="label label-default radius" style="cursor:pointer;" onClick="admin_start(this,{{ $good->id }})">已下线</span>
                                </td>
                            @endif
                            <td>
                                <a title="详情" href="{{ url('index/nav_index_goodsinfo?id='.$good->id) }}"  class="ml-5" style="text-decoration:none" target='_blank'><i class="Hui-iconfont">&#xe616;</i></a>
                                <a title="编辑" href="{{url('admin/service/goodsedit?id='.$good->id)}}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                                <a title="删除" href="javascript:;" onclick="admin_del(this,'{{ $good->id  }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                            </td>
                        </tr>
                    @empty
                        <th scope='col' style="text-align: center" colspan='8'>暂无商品</th>
                    @endforelse

                    </tbody>

                </table>
        </div>
                <div id="pagebox">
                    <!-- 第一部分 -->
                    <a href="javascript:void(0)" id="page1" onclick="page(1)">首页</a>
                    <a href="javascript:void(0)" id="page2" onclick="page(<?php echo 1 ?>)">上一页</a>
                    <a href="javascript:void(0)" id="page3" onclick="page(<?php echo 2 ?>)">下一页</a>
                    <a href="javascript:void(0)" id="page4" onclick="page(<?php echo 1000000 ?>)">尾页</a><br />
                </div>
                <div style="display: inline-block;margin-left: 10px"><sapn>第</sapn><strong id="ever">{{ 1 }}</strong>/<sapn id="all">{{ $all }}</sapn><span>共</span></div>
            </article>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script>
        //      搜索
        $('#search').keyup(function(){
            var value = $('#search').val();
//            $('#tb').children().remove();
//            $('#pagebox').children().remove();
            $.ajax({
                type:'post',
                url:'{{ url('admin/service/GoodsShow') }}',
                dataType:'json',
                data:$('#sfrom').serialize(),
                success:function(data){
//                    eval('var obj=' + data);
                    var obj = data;
                    if(obj.msg==1){
                        console.log(obj);
                        $('#tb').html(obj.data);
                        $('#pagebox').html(obj.page);
                        $('#r').html(obj.count);
                        $('#ever').html(obj.ever);
                        $('#all').html(obj.all);
                    }else{
                        $('#tb').html(obj.data);
                        console.log(obj.data);
//                        $('#pagebox').html('');
                        $('#r').html(0);
                        $('#ever').html(1);
                        $('#all').html(0);
                    }

                }
            });
        });
//        分页
        function page(page){
//            $('#tb').children().remove();
//            $('#pagebox').children().remove();
            var value = $('#search').val();
            $.ajax({
                type:"get",
                url:"{{ url('admin/service/GoodsShow') }}",
                dataType:'json',
                data:{
                    page:page,
                    search:value
                },
                success:function(data){
//                    eval('var json=' + data);
                    var json = data;
                    if(json.msg == '1'){
                        $('#tb').html(json.data);
//                        console.log(json);
                        $('#pagebox').html(json.page);
                        $('#r').html(json.count);
                        $('#ever').html(json.ever);
                        $('#all').html(json.all);
                    }else{
                        $('#tb').html(json.data);
                        $('#r').html(0);
                        $('#ever').html(0);
                        $('#all').html(0);
                    }
                }
            })
        }
        /*商品下线*/
        function admin_stop(obj,id){
            layer.confirm('确认要下线吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $.ajax({
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    url:'{{ url('admin/service/is_store') }}',
                    success:function (data){
                        var htmls = '<span class="label label-default radius" onClick="admin_start(this,'+data+')">已下线</span>';
                        $(obj).parents("tr").find(".td-status").html(htmls);
                        $(obj).remove();
                        layer.msg('已下线!',{icon: 5,time:1000});
                    },
                    error:function (error){
                        console.log(error);
                    }
                });
            });
        }
        /*商品-上线*/
        function admin_start(obj,id){
            layer.confirm('确认要上线吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                var csrf = '{{csrf_token()}}';
                $.ajax({
                    type:'post',
                    dataType:'json',
                    data:{'_token':csrf,id:id},
                    url:'{{ url('admin/service/is_store') }}',
                    success:function (data){
                        var thmls = '<span class="label label-success radius" onClick="admin_stop(this,'+data+')">已上线</span>';
                        $(obj).parents("tr").find(".td-status").html(thmls);
                        $(obj).remove();
                        layer.msg('已上线!', {icon: 6,time:1000});
                    },
                    error:function (error){
                        console.log(error);
                    }
                });


            });
        }
        /*商品-删除*/
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
