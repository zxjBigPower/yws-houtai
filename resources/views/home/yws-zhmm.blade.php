<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>找回密码</title>
    <link rel="icon" href="{{url('Home/yws.ico')}}">
    <link rel="stylesheet" href="{{url('Home/font/iconfont.css')}}">
    <link rel="stylesheet" href="{{url('Home/css/public.css')}}">
    <link rel="stylesheet" href="{{url('Home/css/common.css')}}">
    <link rel="stylesheet" href="{{url('Home/css/yws-zhmm.css')}}">
    <script src="{{asset('Home/lib/js/jquery.min.js')}}"></script>
    <script src="{{asset('Home/js/yws-zhmm.js')}}"></script>
    <!--[if IE]>
    <script src="{{asset('Home/lib/js/html5shiv.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<!--导航栏 start-->
<div class="header clearfix">
    <div class="w">
        <div class="yws-logo fl">
            <div class="yws-logo-line"></div>
            <a href="{{url('Home/')}}index.html"><img src="{{asset('Home/img/logo.png')}}" alt="" height="80px"></a>
        </div>
        <p class="fl">找回密码</p>
    </div>
</div>
<!--导航栏 end-->
<!--findpsw start-->
<div class="findpsw">
    <div class="w">
        <div class="findpsw-box">
            <div class="findpsw-line-1 finishc"><p>验证身份</p></div>
            <div class="findpsw-line-2"><p>设置新密码</p></div>
            <div class="findpsw-line-3"><p>设置完成</p></div>
            <div class="confim-1 confim">
                <form action="#">
                    {{csrf_field()}}
                    <div id="username">
                        <p id="u-alert"><span>!</span>请输入您的用户名或已验证手机号码</p>
                        <span>用户名</span>
                        <input type="text" name="username" id="uname" value="用户名/手机号">
                    </div>
                    <div id="confirmation">
                        <span>验证码</span>
                        <input type="text" name="confirmation" id="info" value="请输入验证码">
                        <div class="con-img"><img src="{{asset('virify')}}" id="imgcode" onclick="this.src=this.src+'?'+(new Date()).getTime()" title="点击更换" style="cursor:pointer;"/></div>
                        <a href="javascript:;" id="changecode">看不清，换一个</a>
                    </div>
                    <div id="checked">
                        <span>已验号码</span>
                        <p id="showphone"></p>
                    </div>
                    <a id="submit1" href="javascript:;">获取短信验证码</a>
                </form>
            </div>
            <div class="confim-2 confim">
                <form action="#">
                    <div id="verify">
                        <span>校验码</span>
                        <input type="text" name="v-number" id="v-number" value="" placeholder="请输入短信校验码">
                        <div id="send_code" >重新获取</div>
                    </div>
                    {{--<div id="verify">--}}
                        {{--<span>校验码</span>--}}
                        {{--<input type="text" name="v-number" id="v-number" value="请输入短信校验码">--}}
                        {{--<p>重新获取</p>--}}
                    {{--</div>--}}
                    <div id="setting-psw">
                        <span>设置密码</span>
                        <input type="password" name="setting" id="setting" value="" placeholder="请输入新密码">
                    </div>
                    <div id="affirm">
                        <span>确认密码</span>
                        <input type="password" name="confim" placeholder="请确认新密码" id="confim">
                        <p id="alert-un">亲，两次的密码不一致，请确认后输入。</p>
                    </div>
                    <a id="submit2" href="javascript:;">确认修改</a>
                </form>
            </div>
            <div class="confim-3">
                <div class="con-success">
                    <img src="{{asset('Home/img/u587.png')}}" alt="">
                    <p>恭喜您，密码重置成功</p>
                    <a href="{{url('login')}}">立即登录</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!--findpsw end-->
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
            <img src="{{asset('Home/img/login/erweima.jpg')}}" alt="">
            <p>微信公众号</p>
        </div>
        <p>Copyright © 2017   湖北云温商互联网商务有限公司  备案号：鄂ICP备15007060号</p>
    </div>
</div>
<!--footer end-->
</body>
</html>