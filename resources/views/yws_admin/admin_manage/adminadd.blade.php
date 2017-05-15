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
			管理员管理
			<span class="c-gray en">&gt;</span>
			管理员添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
		<article style="width: 50%;margin: 0 auto;margin-top: 50px; " class="cl pd-20">
			<form action="" method="post" onsubmit="return false" class="form form-horizontal" id="form-admin-add">
				{{ csrf_field() }}
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="adminName" name="name">
						{{--@if(count($errors)>0)--}}
							{{--<span style="color: orangered">{{ $errors->first('name') }}</span>--}}
						{{--@endif--}}
						<span style="color: orangered" id="admin_add_name"></span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password_confirmation">
						{{--@if(count($errors)>0)--}}
							{{--<span style="color: orangered">{{ $errors->first('password') }}</span>--}}
						{{--@endif--}}
						<span style="color: orangered" id="admin_add_password"></span>
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
						{{--@if(count($errors)>0)--}}
							{{--<span style="color: orangered">{{ $errors->first('phone') }}</span>--}}
						{{--@endif--}}
						<span style="color: orangered" id="admin_add_phone"></span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" placeholder="@" name="email" id="email">
						{{--@if(count($errors)>0)--}}
							{{--<span style="color: orangered">{{ $errors->first('email') }}</span>--}}
						{{--@endif--}}
						<span style="color: orangered" id="admin_add_email"></span>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">角色：</label>
					<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="adminRole" size="1">
					@foreach($roles as $val)
					<option value="{{ $val['id'] }}" >{{ $val['name'] }}</option>
					@endforeach
				</select>
				</span> </div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
						<input class="btn btn-primary radius" id="admin_add_btn" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
					</div>
				</div>
			</form>
		</article>
	</section>
	<script>
		$('#admin_add_btn').click(function (){
		    $.ajax({
		        type:'post',
				url:'{{ url('admin/service/adminadd') }}',
				data:$('#form-admin-add').serialize(),
				success:function(data){
					if(data==2){
					    alert('添加失败');
					}else if(data==1){
					    location.href = '{{ url('admin/adminlist') }}'
					}
				},
                error: function(msg){
                    var json=JSON.parse(msg.responseText);
                    $('#admin_add_name').html(json.name);
                    $('#admin_add_password').html(json.password);
                    $('#admin_add_phone').html(json.phone);
                    $('#admin_add_email').html(json.email);
                }
			});
		});
	</script>
@endsection