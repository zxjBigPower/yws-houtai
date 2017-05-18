

        {{--面包屑--}}
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            新闻管理
            <span class="c-gray en">&gt;</span>
            新闻添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article" style="width: 100%">
        <article  class="cl pd-20" style="width: 80%;margin: 0 auto;margin-top: 20px;">

            <form action="{{ url('admin/service/goodsadd') }}" onsubmit="return false" method="post" class="form form-horizontal" id="form-goods-add" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row cl">
                    <span class="c-red">*</span>新闻标题：
                        <input type="text" class="input-text"  placeholder="名称" id="newName" name="goodsname">
                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_name"></div>
                </div>
                <div class="row cl">
                    <span class="c-red">*</span>所属分类：
                    <input type="text" class="input-text"  placeholder="名称" id="newName" name="goodsname">
                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_name"></div>
                </div>
                <div class="row cl">
                    <span class="c-red">*</span>文章详情：


                    <script type="text/plain" id="myEditor" style="width:100%;height:300px;"></script>


                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_con"></div>
                </div>
                <div class="row cl">
                    <span class="c-red">*</span>文章配图：
                    <input class="btn file" id="newadd_sub" type="file" name="img">
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                        <input class="btn btn-primary radius" id="newadd_sub" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                        <button class="btn btn-primary radius">预览</button>
                    </div>
                </div>
            </form>
        </article>
        </div>
        <script>
            $(function(){
                //实例化编辑器
                var um = UM.getEditor('myEditor');

//        判断内容
                $('#newadd_sub').click(function (){
                    var content =UM.getEditor('myEditor').getContent();
                    var csrf = '{{csrf_token()}}';
                    var title = $('#newName').val();
                    var con=UM.getEditor('myEditor').hasContents();
                    if (!title){
                        $('#newadd_name').html('请添加名称');
                        return;
                    }

                    if(!con){
                        $('#newadd_con').html('请填写文章内容');
                        return;
                    }

                    $.ajax({
                        type:'post',
                        url:'{{url('admin/service/newadd')}}',
                        dataType:'json',
                        data:{'_token':csrf,'content':content,'title':title},
                        success:function (data){
                            if (data.status==1){
                                location.href = '{{url('admin/newlist')}}';
                            }
                        },
                        error:function (data){
                            if (data.status==1){
                                alert(111);
                            }
                        }
                    });
                });
            });
        </script>

