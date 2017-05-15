@extends('admin.master')
@section('header')
    @include('admin.header')
@endsection
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 权限修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="Hui-article">
            <article style="width: 50%;margin: 0 auto;margin-top: 50px;" class="cl pd-20">

                <form action="" onsubmit="return false" method="post" class="form form-horizontal" id="form-permission-edit">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $permi[0]->id }}">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3">
                            <span class="c-red">*</span>名称：
                        </label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" placeholder="" value="{{ $permi[0]->name }}"  name="name">
                            <span style="color: orangered" id="per_edit_name"></span>
                        </div>
                    </div>

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3">
                            <span class="c-red">*</span>描述：
                        </label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" placeholder="" value="{{ $permi[0]->desc }}"  name="desc">
                            <span style="color: orangered" id="per_edit_desc"></span>
                        </div>
                    </div>

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3">
                            <span class="c-red">*</span>路由：
                        </label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" placeholder="" value="{{ $permi[0]->route }}"  name="route">
                            <span style="color: orangered" id="per_edit_route"></span>
                        </div>
                    </div>
                    <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                            <input class="btn btn-primary radius" id="permi_edit_btn" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </section>
    <script>
        $('#permi_edit_btn').click(function (){
            $.ajax({
                type:'post',
                url:'{{ url('admin/service/permissionedit') }}',
                data:$('#form-permission-edit').serialize(),
                success:function (data){
                    location.href = '{{ url('admin/permission') }}';
                },
                error:function (msg){
                    var json=JSON.parse(msg.responseText);
                    $('#per_edit_route').html(json.route);
                    $('#per_edit_name').html(json.name);
                    $('#per_edit_desc').html(json.desc);
                }
            });
        });
    </script>
@endsection