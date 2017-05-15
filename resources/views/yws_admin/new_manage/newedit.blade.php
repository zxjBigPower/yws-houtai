@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection

@section('content')
    <link href="{{ asset('umeditor1.2.3-utf8-php/themes/default/css/umeditor.css') }}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('umeditor1.2.3-utf8-php/third-party/template.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor1.2.3-utf8-php/umeditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor1.2.3-utf8-php/umeditor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('umeditor1.2.3-utf8-php/lang/zh-cn/zh-cn.js') }}"></script>

    <style>
        .Hui-article-box1{
            background-color: #f5f5f5;
            padding: 0 20px;
            position: relative;
            z-index: 99;
        }
    </style>
    <section class="Hui-article-box1">
        {{--面包屑--}}
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            新闻管理
            <span class="c-gray en">&gt;</span>
            新闻修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <article  class="cl pd-20" style="width:70%;margin: 0 auto;">

            <form action="{{ url('admin/service/goodsadd') }}" onsubmit="return false" method="post" class="form form-horizontal" id="form-goods-add" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="{{ $new->id }}">
                <div class="row cl">
                    <span class="c-red">*</span>新闻名称：
                        <input type="text" class="input-text" value="{{ $new->name }}"  placeholder="名称" id="newName" name="goodsname">
                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_name"></div>
                </div>
                <div class="row cl">
                    <script type="text/plain" id="myEditor" style="width:90%;height:300px;">{!! $new->content !!} </script>
                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_con"></div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                        <input class="btn btn-primary radius" id="newedit_sub" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    </div>
                </div>
            </form>
        </article>
    </section>
    <script>
        //实例化编辑器
        var um = UM.getEditor('myEditor');

//        判断内容
        $('#newedit_sub').click(function (){
            var content =UM.getEditor('myEditor').getContent();
            var csrf = '{{csrf_token()}}';
            var title = $('#newName').val();
            var con=UM.getEditor('myEditor').hasContents();
            var id = $('#id').val();
            var status = $
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
                url:'{{url('admin/service/newedit')}}',
                dataType:'json',
              data:{'_token':csrf,'content':content,'title':title,'id':id},
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
    </script>
@endsection