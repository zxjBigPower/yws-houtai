 <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>内容管理
        <span class="c-gray en">&gt;</span> 内容列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <div class="page-container">
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="80">ID</th>
                    <th>标题</th>
                    <th>分类</th>
                    <th width="120">更新时间</th>
                    <th width="60">审核状态</th>
                    <th width="60">上下架</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $val)
                <tr class="text-c">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->title }}</td>
                    <td>{{ $val->fenlei}}</td>
                    <td>{{ $val->created_time }}</td>
                    <td class="td-status1">
                        @if($val->is_pass==1)
                            <span style="cursor: pointer" class="label label-success radius" onClick="new_stop(this,'{{ $val->id }}')">已通过</span>
                        @elseif($val->is_pass==0)
                            <span style="cursor: pointer" class="label label-defaunt radius" onClick="new_start(this,'{{ $val->id }}')">未通过</span>
                        @endif
                    </td>
                    <td class="td-status2">
                        @if($val->is_online==1)
                            <span style="cursor: pointer" class="label label-success radius" onClick="new_linedown(this,'{{ $val->id }}')">已上线</span>
                        @elseif($val->is_online==0)
                            <span style="cursor: pointer" class="label label-defaunt radius" onClick="new_lineup(this,'{{ $val->id }}')">已下线</span>
                        @endif
                    </td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" href="javascript:;" name="{{ url('admin/newedit?id='.$val->id) }}" title="编辑">
                            {{--<i class="Hui-iconfont">&#xe6df;</i>--}}
                            <i class="Hui-iconfont">编辑</i>
                        </a>
                        <a style="text-decoration:none" class="ml-5" href="{{ url('admin/newedit?id='.$val->id) }}" target="_blank" title="查看">
                            {{--<i class="Hui-iconfont">&#xe6df;</i>--}}
                            <i class="Hui-iconfont">查看</i>
                        </a>
                        <a style="text-decoration:none" class="ml-5" onClick="new_del(this,'{{ $val->id }}')" href="javascript:;" title="删除">
                            {{--<i class="Hui-iconfont">&#xe6e2;</i>--}}
                            <i class="Hui-iconfont">删除</i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{ asset('yws_admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('yws_admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('yws_admin/lib/laypage/1.2/laypage.js')}}"></script>
    <script type="text/javascript">
        /*资讯-删除*/
        function new_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){

                $.ajax({
                    type: 'get',
                    url: "{{url('ywsAdmin/article/dodel')}}",
                    data:{'id':id},
                    dataType: 'json',
                    success: function(data){
                        if (data.status==1){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
                        }
                    },
                    error:function(msg) {
                        console.log(msg);
                    }
                });
            });
        }

        /*资讯-下架*/
        function new_linedown(obj,id){
            layer.confirm('确认要下线？',function(index){
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:"{{ url('ywsAdmin/article/doline') }}",
                    data:{'id':id},
                    success:function (data){
                        //console.log(data);
                        if(data.status==1){
//                            alert(data.status);
                            htmls = '<span style="cursor: pointer" class="label label-defaunt radius" onClick="new_lineup(this,'+id+')">未上线</span>';
                            $(obj).parents("tr").find(".td-status2").html(htmls);
                            $(obj).remove();
                            layer.msg('已下线!',{icon: 5,time:1000});
                        }
                    },
                    error:function (msg){
                        console.log(msg);
                    }

                });
            });
        }

        /*资讯-发布*/
        function new_lineup(obj,id) {
            layer.confirm('确认要上线？', function (index) {
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: "{{ url('ywsAdmin/article/doline') }}",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == 1) {
                            htmls = '<span style="cursor: pointer" class="label label-success radius" onClick="new_linedown(this,' + id + ')">已上线</span>';
                            $(obj).parents("tr").find(".td-status2").html(htmls);
                            $(obj).remove();
                            layer.msg('已上线!', {icon: 6, time: 1000});
                        }
                    },
                    error: function (msg) {
//                        alert(111111);
                        console.log(msg);
                    }
                });
            });
        }
            /*资讯-审核*/
            function new_stop(obj,id){
                layer.confirm('确认要不通过审核？',function(index){
                    $.ajax({
                        type:'get',
                        dataType:'json',
                        url:"{{ url('ywsAdmin/article/docheck') }}",
                        data:{id:id},
                        success:function (data){
                            console.log(data);
                            if(data.status==1){
//                            alert(data.status);
                                htmls = '<span style="cursor: pointer" class="label label-defaunt radius" onClick="new_start(this,'+id+')">未通过</span>';
                                $(obj).parents("tr").find(".td-status1").html(htmls);
                                $(obj).remove();
                                layer.msg('已确认未通过!',{icon: 5,time:1000});
                            }
                        },
                        error:function (msg){
                            console.log(msg);
                        }

                    });
                });
            }

            /*资讯-审核*/
            function new_start(obj,id){
                layer.confirm('确认要通过审核吗？',function(index){
                    $.ajax({
                        type:'get',
                        dataType:'json',
                        url:"{{ url('ywsAdmin/article/docheck') }}",
                        data:{id:id},
                        success:function (data){
                            if(data.status==1){
                                htmls = '<span style="cursor: pointer" class="label label-success radius" onClick="new_stop(this,'+id+')">已通过</span>';
                                $(obj).parents("tr").find(".td-status1").html(htmls);
                                $(obj).remove();
                                layer.msg('已确认通过!',{icon: 6,time:1000});
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
