<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--<meta http-equiv="Refresh" content="3; url={{url('/')}}"/>--}}
    <title>注册提示页</title>
    <link rel="icon" href="{{url('home/yws.ico')}}">
    <link rel="stylesheet" href="{{url('home/font/iconfont.css')}}">
    <link rel="stylesheet" href="{{url('home/css/public.css')}}">
    <link rel="stylesheet" href="{{url('home/css/common.css')}}">
    <link rel="stylesheet" href="{{url('home/css/register-success.css')}}">
    <script src="{{asset('home/lib/js/jquery.min.js')}}"></script>
    <script src="{{asset('home/js/register-success.js')}}"></script>
    <!--[if IE]>
    <script src="{{asset('home/lib/js/html5shiv.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<!--导航栏 start-->
<div class="header clearfix">
    <div class="w">
        <div class="yws-logo fl">
            <div class="yws-logo-line"></div>
            <a href="index.html"><img src="{{asset('home/img/logo.png')}}" alt="" height="80px"></a>
        </div>
        <p class="fl">欢迎注册</p>
    </div>
</div>
<!--导航栏 end-->
<!--登录成功界面 start-->
<div class="success">
    <div class="w">
        <div class="success-box">
            <img src="{{asset('home/img/u587.png')}}" alt="">
            <p>恭喜您， <span id="uuname">{{$username}}</span>已注册成功</p>
            <a href="{{url('/')}}">返回商城首页</a> <a href="#" class="jrhyzx">进入会员中心</a>
        </div>
    </div>
</div>
<!--登录成功界面 end-->
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