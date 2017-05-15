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
		<?php
//			var_dump($info);
		?>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
			<span class="c-gray en">&gt;</span>
			管理员管理
			<span class="c-gray en">&gt;</span>
			管理员修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
		<article style="width: 50%;margin: 0 auto;margin-top: 50px;" class="cl pd-20">

			<form action="" onsubmit="return false" method="post" class="form form-horizontal" id="form-admin-edit">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $info['id']}}">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{ $info['name'] }}" placeholder="" id="adminName" name="name">
						<span style="color: orangered" id="admin_edit_name"></span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{ $info['phone'] }}" placeholder="" id="phone" name="phone">
						<span style="color: orangered" id="admin_edit_phone"></span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" placeholder="@" value="{{ $info['email'] }}" name="email" id="email">
						<span style="color: orangered" id="admin_edit_email"></span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">角色：</label>
					<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="role_id" size="1">
					@foreach($roles as $val)
					<option value="{{ $val['id'] }}"
							@if($val['id']==$info['role_id']) selected @endif
					>
							{{ $val['name'] }}</option>
						@endforeach
				</select>
				</span> </div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
						<input class="btn btn-primary radius" id="admin_edit_btn" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					</div>
				</div>
			</form>
		</article>
	</section>
	<script>
        $('#admin_edit_btn').click(function (){
            $.ajax({
                type:'post',
                url:'{{ url('admin/service/adminedit') }}',
                data:$('#form-admin-edit').serialize(),
                success:function(data){
                    console.log(data);
                  	if(data==1){
                        location.href = '{{ url('admin/adminlist') }}';
                    }
                },
                error: function(msg){
                    console.log(msg);
                    var json=JSON.parse(msg.responseText);
                    $('#admin_edit_name').html(json.name);
                    $('#admin_edit_email').html(json.email);
                    $('#admin_edit_phone').html(json.phone);
                }
            });
        });
	</script>

@endsection