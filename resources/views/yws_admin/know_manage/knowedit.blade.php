@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <link href="{{ asset('umeditor1.2.3-utf8-php/themes/default/css/umeditor.css') }}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('umeditor1.2.3-utf8-php/third-party/template.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor1.2.3-utf8-php/umeditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor1.2.3-utf8-php/umeditor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('umeditor1.2.3-utf8-php/lang/zh-cn/zh-cn.js') }}"></script>

    <section class="Hui-article-box">
        {{--面包屑--}}
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
            <span class="c-gray en">&gt;</span>
            知识堂管理
            <span class="c-gray en">&gt;</span>
            知识堂修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article">
        <article  class="cl pd-20" style="width: 50%;margin: 0 auto;margin-top: 20px;">

            <form    enctype="multipart/form-data" onsubmit="return false" method="post" class="form form-horizontal" id="form-know-add" >
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $know->id }}">
                <div class="row cl">
                    <span class="c-red">*</span>知识堂标题：
                        <input type="text" class="input-text" value="{{ $know->name }}"  placeholder="名称" id="knowname" name="knowname">
                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_name"></div>
                </div>
                <div class="row cl">
                    <span class="c-red">*</span>知识堂封面：
                    <img src="{{ asset($know->pic) }}" style="height: 50px;" alt="">
                    <input type="file" class="input-text"  placeholder="名称" id="knowpic" name="knowpic">
                </div>
                <div class="row cl">
                    <script type="text/plain" id="myEditor" style="width:90%;height:300px;">{!! $know->content  !!}</script>
                    <div style="color: orangered;margin: 0 auto;text-align: center" id="newadd_con"></div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                        <input class="btn btn-primary radius" id="newadd_sub" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    </div>
                </div>
            </form>
        </article>
        </div>
    </section>
    <script>
        //实例化编辑器
        var um = UM.getEditor('myEditor');

//        判断内容
        $('#newadd_sub').click(function (){
            var myform = document.getElementById('form-know-add');
            var data = new FormData(myform);
            var title = $('#knowname').val();
            var con=UM.getEditor('myEditor').hasContents();
            if (!title){
                $('#newadd_name').html('请添加标题');
                return;
            }

            if(!con){
                $('#newadd_con').html('请填写文章内容');
                return;
            }

            $.ajax({
                type:'post',
                url:'{{url('admin/service/knowedit')}}',
                dataType:'json',
                processData:false,
                contentType:false,
                data:data,
                success:function (data){
                    if (data.status==1){
                        location.href = '{{url('admin/knowlist')}}';
                    }
                },
                error:function (msg){
                    alert(11111);
                }
            });
        });

    </script>

@endsection