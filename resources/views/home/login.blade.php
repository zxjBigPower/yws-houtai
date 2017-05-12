<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎登录</title>
    <link rel="icon" href="{{url('home/yws.ico')}}">
    <link rel="icon" href="yws.ico">
    <link rel="stylesheet" href="{{asset('home/font/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/login.css')}}">
    <link rel="stylesheet" href="{{url('home/css/public.css')}}">
    <link rel="stylesheet" href="{{url('home/css/common.css')}}">
    <script src="{{asset('home/lib/js/jquery.min.js')}}"></script>
    <script src="{{asset('home/js/login.js')}}"></script>
    <!--[if IE]>
    <script src="{{asset('lib/js/html5shiv.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<!--导航栏 start-->
<div class="header clearfix">
    <div class="w">
        <div class="yws-logo fl">
            <div class="yws-logo-line"></div>
            <a href="{{url('/')}}"><img src="{{asset('home/img/logo.png')}}" alt="" height="80px"></a>
        </div>
        <p class="fl">欢迎登录</p>
        <div class="yws-login fr"><span>没有账号？</span><a href="#">请注册</a></div>
    </div>
</div>
<!--导航栏 end-->
<!--登录界面 start-->
<div class="login">
<div class="w">
    <div class="login-banner fl"></div>
    <div class="login-log fr">
        <form  id="info" name="userinfo" method="post" onsubmit="return false" action="{{url('login')}}">
            {{csrf_field()}}
            <p>会员登录</p>
            <div id="username" >
                <i class="iconfont icon-touxiang"></i>
                <input type="text" name="uname" placeholder="用户名/手机号">
                <div class="login-alert"></div>
            </div>
            <div id="psw"><i class="iconfont icon-mima"></i><input type="text" name="pass" placeholder="请输入登录密码"></div>
            <div id="checking">
                <i class="iconfont icon-yanzhengma"></i>
                <input type="text" name="captcha" id="captcha" placeholder="请输入验证码">
                <div class="yanzhengma fr">
                    <img src="{{Captcha::src()}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" title="点击更换" style="cursor:pointer;"/>
                </div>
            </div>
            <div id="login-checkbox">
                <input type="checkbox" name="auto_login" value="1" checked>自动登录
                <a href="#">找回密码？</a>
            </div>
            <input id="submit" type="submit" value="立即登录">

            <div id="zhuce">
                <a href="#">微信</a><a href="#">QQ</a><a href="#" class="border-none">微博</a>
                <p class="fr"><a href="#"><i class="iconfont icon-guanbi01"></i>立即注册</a></p>
            </div>
        </form>
    </div>
</div>
</div>
<!--登录界面 end-->
<!--footer start-->
<div class="footer clearfix">
    <div class="w">
        <div class="footer-box clearfix fl">
            <ul class="fl">
                <li>购物指南</li>
                <li><a href="#">购物流程</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">提交订单</a></li>
            </ul>
            <ul class="fl">
                <li>会员中心</li>
                <li><a href="#">会员介绍</a></li>
                <li><a href="#">实名中心</a></li>
                <li><a href="#">发票中心</a></li>
            </ul>
            <ul class="fl">
                <li>配送方式</li>
                <li><a href="#">送货方式</a></li>
                <li><a href="#">服务查询</a></li>
                <li><a href="#">收费标准</a></li>
            </ul>
            <ul class="fl">
                <li>服务中心</li>
                <li><a href="#">取消订单</a></li>
                <li><a href="#">联系客服</a></li>
                <li><a href="#">汇款信息</a></li>
            </ul>
            <ul class="fl">
                <li>售后服务</li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">联系我们</a></li>
                <li><a href="#">服务地区</a></li>
            </ul>
            <ul class="fl">
                <li>特色服务</li>
                <li><a href="#">取消订单</a></li>
                <li><a href="#">联系客服</a></li>
                <li><a href="#">汇款信息</a></li>
            </ul>
            <ul class="fl">
                <li>关于云温商</li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">联系我们</a></li>
                <li><a href="#">服务地区</a></li>
            </ul>
        </div>
        <div class="footer-box-r fr clearfix">
            <img src="{{asset('home/img/login/erweima.jpg')}}" alt="">
            <p>微信公众号</p>
        </div>
        <p>Copyright © 2017   湖北云温商互联网商务有限公司  备案号：鄂ICP备15007060号</p>
    </div>
</div>
<!--footer end-->
</body>
</html>