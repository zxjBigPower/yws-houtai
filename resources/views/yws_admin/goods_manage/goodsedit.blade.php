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
            商品修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <article style="margin: 10px 400px 0px 200px " class="cl pd-20">

            <form action="{{ url('admin/service/goodsadd') }}" onsubmit="return false" method="post" class="form form-horizontal" id="form-goods-add" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="{{$type['type']}}" placeholder="名称" id="adminName" name="goodsname">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品型号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" autocomplete="off" value="{{$good['model']}}" placeholder="型号" id="model" name="goodsmodel">
                    </div>
<!--                    --><?php //var_dump($type,$img,$good,$say);?>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>商品图片：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="file" class="input-text" id="password2" name="goodsimgs" >
                        <img src="{{ asset('fileupload/goods/goodsimgs').'/'.$img['pic'] }}" alt="" width="60" style="margin-left:4px;border:1px solid gray;">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>基本描述：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea name="goods_descript" rows="5" cols="61.5">{{ $good['descript'] }}</textarea>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>描述图片：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="file" class="input-text" name="sayimgs[]" id="email"  multiple>
                        @foreach($say as $val)

                        <img src="{{ asset('fileupload/goods/sayimgs').'/'.$val['url'] }}" alt="" width="50" style="margin-left:4px;border:1px solid gray;">
                        @endforeach
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否上线：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <label >是：<input type="radio" {{ ($good['is_store']==1)?"checked":'' }} value=1 name="is_store"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label >否：<input type="radio"  {{ ($good['is_store']==2)?"checked":'' }} value=2 name="is_store"></label>
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
            var id = $('input[name=id]').val();
//            alert(id);
            var url = "{{ url('admin/service/goodsedit') }}";
//            alert(url);
            var myform = document.getElementById('form-goods-add');
            var date = new FormData(myform);
//            location.reload();
            $.ajax({
                type:'post',
                url:url,
                data:date,
                processData:false,
                contentType:false,
                success:function(data){
                    if(data==1){
                        alert('修改成功');
                        location.href="{{ url('admin/goodslist') }}";
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
                    alert('修改失败');
                }
            });
            return false;
        });
    </script>
@endsection