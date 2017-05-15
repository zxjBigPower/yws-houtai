@extends('admin.master')
@section('content')
    <input type="hidden" id="TenantId" name="TenantId" value="" />
    <div class="header" style="background: #426374">
        <p style="color: #fff;font-size: 20px;margin: 10px 0px 0px 20px">
            言叶科技后台管理
        </p>
    </div>
    <div class="loginWraper">
        <div id="loginform" class="loginBox">
            <form class="form form-horizontal" id="admin_login_form" action="{{ url('admin/service/login') }}" method="post">
                {{ csrf_field() }}
                <div  id="admin_login_wrong" style="display: none; text-align: center;color: orangered;font-size: 16px">账号密码错误</div>
                <div  id="admin_login_check" style="display: none; text-align: center;color: orangered;font-size: 16px">请验证</div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="name" type="text" placeholder="账户" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3">验证</label>
                    <div  class="formControls col-xs-8 ">
                        {!! Geetest::render() !!}
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
    <div class="footer">言叶科技</div>
    <script>

    </script>
@endsection