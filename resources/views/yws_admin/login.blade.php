@extends('yws_admin.master')
@section('content')
    <input type="hidden" id="TenantId" name="TenantId" value="" />
    <div class="header" style="background: #426374">
        <p style="color: #fff;font-size: 20px;margin: 10px 0px 0px 20px">
            云温商后台管理
        </p>
    </div>
    <div class="loginWraper">
        <div id="loginform" class="loginBox">
            <form class="form form-horizontal" id="admin_login_form" onsubmit="return false" action="{{ route('dologin') }}" method="post">
                {{ csrf_field() }}
                <div  id="admin_login_wrong" style="display: none; text-align: center;color: orangered;font-size: 16px"></div>
                {{--<div  id="admin_login_check" style="display: none; text-align: center;color: orangered;font-size: 16px">请验证</div>--}}
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="name" type="text" value="{{old('name')}}" placeholder="账户" class="input-text size-L"  autofocus>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="password" type="password" placeholder="密码" class="input-text size-L" required>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="captcha" type="text" placeholder="验证码" class="input-text size-L" style="width: 70%" required>
                        <img src="{{Captcha::src()}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" title="点击更换" style="cursor:pointer;"/>
                    </div>
                </div>
                <div class="row cl" >
                    <div class="formControls col-xs-8 col-xs-offset-3" >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="" type="submit" id="admin_login_btn" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">云温商</div>
    <script>
        $('#admin_login_form').submit(function(){
            $.ajax({
                url:"{{route('dologin')}}",
                type:'post',
                dataType:'json',
                data:$('#admin_login_form').serialize(),
                success:function(data){
                    //console.log(data);
                    if(data.status==400){
                        $("#admin_login_wrong").css("display","block").html(data.msg);
                    }
                    if(data.status==200){
                        location.href = "{{route('index')}}";
                    }
                    return false;
                },
                error:function(msg){
                    //alert(11);
                    console.log(msg.responseText);
                    if(msg.responseText){
                        var json = JSON.parse(msg.responseText);
                        //console.log(json['captcha'][0]);
                        $("#admin_login_wrong").css("display","block").html(json['captcha'][0]);
                        //$("#admin_login_wrong");
                    }
                    return false;
                },
            });
        });
    </script>
@endsection