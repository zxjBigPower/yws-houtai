<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>欢迎注册</title>
    <link rel="icon" href="{{url('home/yws.ico')}}">
    <link rel="stylesheet" href="{{url('home/font/iconfont.css')}}">
    <link rel="stylesheet" href="{{url('home/css/public.css')}}">
    <link rel="stylesheet" href="{{url('home/css/common.css')}}">
    <link rel="stylesheet" href="{{url('home/css/register.css')}}">
    <script src="{{asset('home/lib/js/jquery.min.js')}}"></script>
    <script src="{{asset('home/js/register.js')}}"></script>
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
                <a href="{{url('/')}}"><img src="{{asset('home/img/logo.png')}}" alt="" height="80px"></a>
            </div>
            <p class="fl">欢迎注册</p>
            <div class="yws-login fr"><span>已有账号？</span><a href="{{url('login')}}">请登录</a></div>
        </div>
    </div>
    <!--导航栏 end-->
    <!--注册界面 start-->
    <div class="register">
        <div class="w">
            <div class="register-box">
                <form action="{{url('register/complete')}} " method="post" id="registerForm">
                    {{csrf_field()}}
                    <div id="userName">
                        <span>用户名</span>
                        <input id="uname" name="username" value="您的账户名或登录名" type="text" maxlength="20">
                        <div class="userName-alert"><span>!</span>支持字母、数字、符号的组合，4-20个字符</div>
                        <i class="close">×</i>
                        <p class="zc-success" id="zc-success"></p>
                        <p class="zc-filed" id="zc-filed"></p>
                    </div>
                    <div id="setPsw">
                        <span>设置密码</span>
                        <input id="upsw" name="password" value="" type="password" maxlength="20"/>
                        <div class="setPsw-alert"><span>!</span>建议使用字母、数字和符号两种及以上的组合</div>
                        <i class="close">×</i>
                        <p class="zc-success" id="psw-success"></p>
                        <p class="zc-filed" id="psw-filed"></p>
                    </div>
                    <div id="mobNum">
                        <span>手机号码</span>
                        <input id="unum" name="phone" value="建议使用常用手机" maxlength="11" type="text">
                        <div class="mobNum-alert"><span>!</span>完成验证后，可以使用该手机或邮箱登录和找回密码</div>
                        <i class="close">×</i>

                        <p class="zc-success" id="mobile-success"></p>
                        <p class="zc-filed" id="mobile-filed"></p>
                    </div>
                    <div id="authCode">
                        <span>验证码</span>
                        <input id="ucon" name="ucon" value="请输入验证码" type="text">
                        <div class="authCode-alert"><span>!</span>看不清？点击图片更换验证码</div>
                        {{--<p><img src="{{Captcha::src()}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" title="点击更换" style="cursor:pointer;"/></p>--}}
                        <p><img src="{{asset('virify')}}" onclick="this.src=this.src+'?'+(new Date()).getTime()" title="点击更换" style="cursor:pointer;"/></p>
                        {{--<h6><a href="#">看不清，换一个</a></h6>--}}
                        <i class="close">×</i>
                        <p class="zc-success" id="pcode-success"></p>
                        <p class="zc-filed" id="pcode-filed"></p>
                    </div>
                    <div id="mobAuth">
                        <span>手机验证码</span>
                        <input id="umoc" name="umoc" value="请输入手机验证码" type="text" maxlength="6">
                        <p id="send_code" style="cursor: pointer;">获取验证码</p>

                        <p class="zc-success" id="getcode-success"></p>
                        <p class="zc-filed" id="getcode-filed"></p>

                    </div>
                    <div id="isAgreeBox"><input checked type="checkbox" name="isAgree" id="isAgree">&nbsp;我已阅读同意<a href="yws-zcxy.html">《云温商用户协议》</a></div>
                    <input type="submit" id="submit" value="提交注册">
                </form>
            </div>
        </div>
    </div>
    <!--注册界面 end-->
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
            <p>Copyright © 2017 湖北云温商互联网商务有限公司 备案号：鄂ICP备15007060号</p>
        </div>
    </div>
    <!--footer end-->
</body>

</html>
