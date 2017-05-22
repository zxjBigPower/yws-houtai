<link href="{{ asset('/ywsAdmin/themes/default/css/umeditor.css') }}" type="text/css" rel="stylesheet">
<script type="text/javascript" src="{{ asset('/ywsAdmin/third-party/template.min.js') }}"></script>
<script type="text/javascript" charset="utf-8" src={{asset('ywsAdmin/umeditor.config.js')}}></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('/ywsAdmin/umeditor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/ywsAdmin/lang/zh-cn/zh-cn.js') }}"></script>

        {{--面包屑--}}
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            新闻管理
            <span class="c-gray en">&gt;</span>
            新闻添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article" style="width: 100%">
            <article  class="cl pd-20" style="width: 80%;margin: 0 auto;margin-top: 20px;">

                <form action="{{ url('article/doadd') }}" onsubmit="return false" method="post" class="form form-horizontal" id="newsaddfrom" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row cl">
                        <span class="c-red">*</span>新闻标题：
                            <input type="text" class="input-text"  placeholder="名称" id="newstitle" name="newstitle" required autofocus>
                        <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_name"></div>
                    </div>
                    <div class="row cl">
                        <span class="c-red">*</span>所属分类：
                        <select name="fenlei" id="fenlei">
                            @foreach($types as $type)
                                <option >{{$type->type}}</option>
                            @endforeach
                        </select>
                        <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_name"></div>
                        <button class="btn btn-primary radius" id="addfenlei">添加分类</button>
                    </div>
                    <div class="row cl">
                        <span class="c-red">*</span>文章详情：

                        <script type="text/plain" id="myEditor" style="width:80%;height:500px;"></script>

                        <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_con"></div>
                    </div>
                    <div class="row cl">
                        <span class="c-red">*</span>文章配图：
                        <input class="btn file" id="img" type="file" name="img" required/>
                    </div>

                    <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                            <input class="btn btn-primary radius" id="newadd_sub"  type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"/>
                            <button class="btn btn-primary radius">预览</button>
                        </div>
                    </div>
                </form>
            </article>
        </div>
        <script>
            //编辑器==============================
            //实例化编辑器
            var um = UM.getEditor('myEditor');
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
                                var obj=document.getElementById('fenlei');
                                obj.options.add(new Option(name)); //这个兼容IE与firefox
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

            //        判断内容
            $('#newadd_sub').click(function(){
                var content = UM.getEditor('myEditor').getContent();
                var _token = $('input[name=_token]').val();

                var title = $('#newstitle').val();
                var con = UM.getEditor('myEditor').hasContents();
                //alert(_token);

                var myform = document.getElementById('newsaddfrom');
                var newsdata = new FormData(myform);

                //console.log(data);return;

                //alert(content);return;
                //alert(title);
                if (!title) {
                    $('#newadd_name').html('请添加名称');
                    return;
                }else{
                    $('#newadd_name').html('');
                }

                if (!con) {
                    $('#newadd_con').html('请填写文章内容');
                    return;
                }else{
                    $('#newadd_con').html('');
                }
                if($('#newadd_sub').hasClass('oldcommit')){
                    alert('请不要重复提交');
                    return;
                }
                //console.log({'_token':_token,'data':data,'conten':content});
                $.ajax({
                    type:'post',
                    url:'./article/doadd',
                    data:newsdata,
                    dataType:'json',
                    processData:false,
                    contentType:false,
                    success:function(data){
                        console.log(data);
                        if(data.status==200){
                            $('#newadd_sub').addClass('oldcommit');
                            alert('添加成功');

                        }else if(data.status == 400){
                            alert(data.msg);
                        }
                        return false;
                    },
                    error:function(msg){
                        console.log('error');
                    }
                });
            });

//            ======end========================================================
        </script>

