@extends('admin.master')
@section('header')
    @include('admin.header')
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
            商品添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <article style="width: 50%;margin: 0 auto;margin-top: 50px; " class="cl pd-20">

            <form action="{{ url('admin/service/goodsadd') }}" onsubmit="return false" method="post" class="form form-horizontal" id="form-goods-add" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder="名称" id="adminName" name="goodsname">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品型号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" autocomplete="off" value="" placeholder="型号" id="model" name="goodsmodel">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品图片：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="file" class="input-text" id="password2" name="goodsimgs">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>基本描述：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea name="goods_descript" rows="5" cols="61.5"></textarea>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>描述图片：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="file" class="input-text" name="sayimgs[]" id="email"  multiple>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否上线：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <label >是：<input type="radio" value="1"  name="is_store"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label >否：<input type="radio" value="2"  name="is_store"></label>
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    </div>
                </div>
            </form>
        </article>
        <p style="color:red;" id = "mes_p">图片单张最大不超过2MB</p>
    </section>
@endsection
@section('js')
<script>
    $('#form-goods-add').submit(function(){
        var myform = document.getElementById('form-goods-add');
        var date = new FormData(myform);
        {{--location.href= '{{ url('admin/service/goodsedit/goodsadd') }}';--}}
        $.ajax({
            type:'post',
            url:'{{ url('admin/service/goodsadd') }}',
            data:date,
            processData:false,
            contentType:false,
            success:function(data){
                if(data==1){
                    alert('添加成功');
                    location.reload();
                }else if(data == 2){
                    $('#mes_p').html('请填写完整');
                }else if(data==3){
                    $('#mes_p').html('上传图片失败');
                }else if(data==4){
                    $('#mes_p').html('该商品已存在');
                }
                return false;
            },
            error:function(msg){
                alert('添加失败');
            }
        });
        return false;
    });
</script>
@endsection