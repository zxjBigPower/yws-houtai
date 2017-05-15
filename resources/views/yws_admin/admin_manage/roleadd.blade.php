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
            角色管理
            <span class="c-gray en">&gt;</span>
            角色添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
        <div class="Hui-article">
        <article class="cl pd-20" style="width: 50%;margin: 0 auto;margin-top: 50px;">
            <form action="{{ url('admin/service/roleadd') }}" method="post" class="form form-horizontal" id="form-admin-role-add">
                {{ csrf_field() }}
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" id="roleName" name="name">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">备注：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" name="desc">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">网站权限：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        @foreach($menu as $val)
                        <dl class="permission-list">
                            <dt>
                                <label>
                                    <input type="checkbox" value="{{ $val->id }}" name="role_id[]" id="">
                                    {{ $val->name }}</label>
                            </dt>
                            <dd>
                                <dl class="cl permission-list2">
                                    @foreach($menudata as $value)
                                     @if($value->uid==$val->id)
                                    <dt>
                                        <label class="">
                                            <input type="checkbox" value="{{ $value->id }}" name="role_id[]" id="user-Character-0-1">
                                            {{ $value->name }}</label>
                                    </dt>
                                    @endif
                                    @endforeach
                                </dl>
                            </dd>
                        </dl>
                        @endforeach
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                        <button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
                    </div>
                </div>
            </form>
        </article>
        </div>
    </section>
    <script>
    </script>
@endsection