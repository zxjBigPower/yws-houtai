<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>分类管理
    <span class="c-gray en">&gt;</span> 分类列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" id="addfenlei" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加分类
            </a>
        </span>

    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="80">ID</th>
                <th>分类名称</th>
                <th width="60">顺序级别</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $val)
                <tr class="text-c">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->type }}</td>
                    <td class="td-status1">
                        <input type="number" name="orderly" value="{{$val->orderly}}" onblur="orderly(this,{{$val->id}})">
                        {{--<span style="cursor: pointer" class="label label-defaunt radius" onClick="new_start(this,'{{ $val->id }}')">未通过</span>--}}
                    </td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="new_del(this,'{{ $val->id }}')" href="javascript:;" title="删除">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                            {{--<i class="Hui-iconfont">删除</i>--}}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="color:red;">数字越大排序级别越高</div>
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
                url: "{{url('ywsAdmin/fenlei/dodel')}}",
                data:{'id':id},
                dataType: 'json',
                success: function(data){
                    if (data.status==200){
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

    function orderly(obj,id)
    {
        //alert($(obj).val());
        $.ajax({
            type: 'get',
            url: "{{url('ywsAdmin/fenlei/doorderly')}}",
            data:{'id':id,'orderly':$(obj).val()},
            dataType: 'json',
            success: function(data){
                if (data.status==200){
                    console.log(data);
                }
            },
            error:function(msg) {
                console.log(msg);
            }
        });
    }

    //添加分类
    $('#addfenlei').click(function(){
        //弹出一个输入框，输入一段文字，可以提交
        var name = prompt("请输入您分类名称", ""); //将输入的内容赋给变量 name ，
        if (name) {
            $.ajax({
                url:"{{url('ywsAdmin/fenlei/doadd')}}",
                dataType:'json',
                data:{'fenlei':name},
                success:function(data){
                    if(data.status==200){
                        alert(data.msg);
                        //$('#fenlei').append("<option>"+name+"<option>");
                        console.log(data.tr);
                        $('tbody').append(data.tr);

                    }else{
                        console.log('insert to faild');
                    }
                },
                error:function (msg) {
                    console.log(msg);
                }
            });
        }
    });
</script>
