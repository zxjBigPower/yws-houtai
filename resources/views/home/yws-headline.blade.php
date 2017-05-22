<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>云温商头条</title>
    <link rel="stylesheet" href="{{url('home/lib/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('home/lib/css/bootstrap-theme.min.css')}}">
    <link rel="icon" href="{{url('home/yws.ico')}}">
    <link rel="stylesheet" href="{{url('home/lib/css/yx_rotaion.css')}}">
    <link rel="stylesheet" href="{{url('home/css/public.css')}}">
    <link rel="stylesheet" href="{{url('home/css/common.css')}}"><!--
    <link rel="stylesheet" href="{{url('home/css/common-header.css')}}">-->
    <link rel="stylesheet" href="{{url('home/css/yws-headline.css')}}">
    <link rel="stylesheet" href="{{url('home/font/iconfont.css')}}">
</head>
<body>
<!--header start-->
<div class="header clearfix">
    <div class="w">
        <div class="yws-logo fl"><a href="{{url('/')}}"><img src="{{url(asset('home/img/logo.png'))}}" alt="" height="80px"></a></div>
        <ul id="nav-ul">
            <li><a href="index.html">首页</a></li>
            <li><a  href="#">爆款定制</a></li>
            <li><a  href="#">厂家直销</a></li>
            <li><a  href="yws-jmdl.html">加盟代理</a></li>
            <li><a  href="#" class="hover">云温商头条</a></li>
            <li><a  href="yws-financial.html">云温商金融</a></li>
            <li><a  href="yws-gywm.html">关于我们</a></li>
        </ul>
        <ol>
            <li><a href="register.html" class="yws-header-zc">免费注册</a></li>
            <li><a href="logIn.html">登录</a></li>
        </ol>
    </div>
</div>
<!--header end-->
<!--banner start-->
<div class="yws-banner">
    <div class="w">
        <div class="yx-rotaion fl">
            <ul class="rotaion_list">
                <li><a href="#"><img src="{{url('home/img/yws-headline/1.jpg')}}" alt="深耕互联网新零售领域，云温商打造“新零售移动电商第一品牌”……"></a></li>
                <li><a href="#"><img src="{{url('home/img/yws-headline/2.jpg')}}" alt="深耕互联网新零售领域，云温商打造“新零售移动电商第一品牌”……"></a></li>
                <li><a href="#"><img src="{{url('home/img/yws-headline/3.jpg')}}" alt="深耕互联网新零售领域，云温商打造“新零售移动电商第一品牌”……"></a></li>
                <li><a href="#"><img src="{{url('home/img/yws-headline/4.jpg')}}" alt="深耕互联网新零售领域，云温商打造“新零售移动电商第一品牌”……"></a></li>
                <li><a href="#"><img src="{{url('home/img/yws-headline/5.jpg')}}" alt="深耕互联网新零售领域，云温商打造“新零售移动电商第一品牌”……"></a></li>
            </ul>
        </div>
        <ul class="fl">
            <li class="fl"><a href="#">
                <img src="" alt="">
                <p>物流运输和仓储……</p>
            </a>
            </li>
            <li class="fl"><a href="#">
                <img src="" alt="">
                <p>如何理解区域代理……</p>
            </a>
            </li>
            <li class="fl"><a href="#">
                <img src="" alt="">
                <p>国家绿色数据中心……</p>
            </a></li>
        </ul>
        <div class="rotaion-t fr">
            <a href="yws-jmdl.html">
                <span>招商加盟</span>
                <p>专业化代理服务</p>
            </a>
            <a href="yws-jmdl.html" class="knowMore">了解更多</a>
        </div>
        <div class="rotaion-b fr">
            <a href="yws-financial.html">
                <span>供应链金融</span>
                <p>一体化服务</p>
            </a>
        </div>
    </div>
</div>
<!--banner end-->
<!--content start-->
<div class="yws-con clearfix">
    <div class="w">
        <div class="con-l fl">
            <div class="con-ctr clearfix">
                <a href="yws-zxlby.html"><h3 class="hover">今日头条</h3></a>
                <a href="yws-zxlby.html"><h3>品牌新闻</h3></a>
                <a href="yws-zxlby.html"><h6>查看更多>></h6></a>
            </div>
            <div class="con-jrtt">
                <ul id="jrtt">
                    @forelse($news as $new)
                        <li class="clearfix">
                            <a href="" class="fl"><img src="{{asset($new->cover)}}" alt=""><span>品牌新闻</span></a>
                            <a href="#" class="fl"><h3>{{$new->title}}</h3></a>
                            <span>{{date('Y年m月d日 H时i分',strtotime($new->updated_time))}}</span>
                            <p>{{$new->content}}</p>

                            <div class="con-info">
                                <span><i>☀</i>阅读 <del>9999</del></span>
                                <em><i>☀</i>收藏
                                    <del>9999</del>
                                </em>
                                <strong><i>☀</i>被赞
                                    <del>9999</del>
                                </strong>
                            </div>
                        </li>
                    @empty
                        <li class="clearfix">
                            暂无数据
                        </li>
                    @endforelse
                </ul>

            </div>
            <div class="con-ppxw">
                <ul id="ppxw">
                </ul>
            </div>
        </div>
        <div class="con-r fr">
            <h3>热门文章 <a href="yws-zxlby.html"><span>查看更多>></span></a></h3>
            <div class="con-r-box">
                <ul id="hotNews">
                    <!--<li class="clearfix">
                        <span>1</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>2</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>3</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>4</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>5</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>6</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>7</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>8</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>9</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>
                    <li class="clearfix">
                        <span>10</span>
                        <a href="#">
                            <p>全国上半年跨境电子商务交易2.6万亿电子商务交易2.6万亿</p>
                        </a>
                        <em><i>☺</i>收藏
                            <del>123</del>
                        </em>
                        <em><i>☺</i>点赞
                            <del>123</del>
                        </em>
                    </li>-->
                </ul>
            </div>
            <div class="con-r-bot">
                <h3>热门标签</h3>
                <div class="con-r-bot-bq clearfix">
                    <a href="#">热门标签</a>
                    <a href="#">热门签</a>
                    <a href="#">热门</a>
                    <a href="#">标签</a>
                    <a href="#">热门标签</a>
                    <a href="#">热标签</a>
                    <a href="#">门标签</a>
                    <a href="#">签</a>
                    <a href="#">热门标签</a>
                    <a href="#">热标签</a>
                    <a href="#">热门标签</a>
                    <a href="#">热门签</a>
                    <a href="#">热门</a>
                    <a href="#">标签</a>
                </div>
                <div class="con-r-bot-b1"></div>
                <div class="con-r-bot-b2"></div>
            </div>
        </div>
    </div>
</div>
<!--content end-->
<!--固定窗口 start-->
<div class="yws-fixed">
    <div class="yws-wx">
        <i class="iconfont icon-qrcode"></i>
        <div class="wx-alert">
            <img src="{{url('home/img/login/erweima.jpg')}}" alt="">
            <p>微信公众号</p>
        </div>
    </div>
    <div class="yws-kf">
        <i class="iconfont icon-kefu"></i>
        <div class="kf-alert">
            <a href="#">027-82881111</a>
        </div>
    </div>
    <div class="toTop">
        <a href="#"><i class="iconfont icon-tub35_fanhuidingbu"></i></a>
    </div>
</div>

<!--固定窗口 end-->

<!--footer start-->
<!--<div class="footer clearfix">
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
            <img src="img/login/erweima.jpg" alt="">
            <p>微信公众号</p>
        </div>
        <p>Copyright © 2017 <a href="index.html">湖北云温商互联网商务有限公司</a> 备案号：鄂ICP备15007060号</p>
    </div>
</div>-->
<div class="footer clearfix">
    <div class="w">
        <div class="footer-box-l clearfix ">
            <p>Copyright © 2017 <a href="index.html">湖北云温商互联网商务有限公司</a> 鄂ICP备15007060号</p>
        </div>
    </div>
</div>
<!--footer end-->


<script src="{{url('home/lib/js/jquery.1-11-1.js')}}"></script>
<script src="{{url('home/js/common.js')}}"></script>
<!--arttemplate 模板渲染-->
<script src="{{url('home/lib/js/template.js')}}"></script>
<!--轮播图组件-->
<script src="{{url('home/lib/js/jquery.yx_rotaion.js')}}"></script>
<script src="{{url('home/js/yws-headline.js')}}"></script>
<!--[if lt IE 9]>
<script src="{{url('home/lib/js/html5shiv.min.js')}}"></script>
<![endif]-->
<!--今日头条页面模板拼接-->
{{--<script type="text/html" id="xr-jrtt">--}}
    {{--{{each list as value i}}--}}
    {{--<li class="clearfix">--}}
        {{--<a href="" class="fl"><img src="" alt="" background-color="{{value.img}}"><span>{{value.tag}}</span></a>--}}
        {{--<a href="#" class="fl"><h3>{{value.title}}</h3></a>--}}
        {{--<span>{{value.timing}}</span>--}}
        {{--<p>{{value.details}}</p>--}}
        {{--<div class="con-info">--}}
            {{--<span><i class="iconfont icon-yuedu"></i>&nbsp; 阅读<del>{{value.reading}}</del></span>--}}
            {{--<em><i class="iconfont icon-shoucang"></i>&nbsp; 收藏--}}
                {{--<del>{{value.collect}}</del>--}}
            {{--</em>--}}
            {{--<strong><i class="iconfont icon-zan"></i>&nbsp; 被赞--}}
                {{--<del>{{value.zan}}</del>--}}
            {{--</strong>--}}
        {{--</div>--}}
    {{--</li>--}}
    {{--{{/each}}--}}
    {{--<a class="getMore" href="#">浏览更多</a>--}}
{{--</script>--}}
<!--品牌新闻页面模板拼接-->
{{--<script type="text/html" id="xr-ppxw">--}}
    {{--{{each list as value i}}--}}
    {{--<li class="clearfix">--}}
        {{--<a href="" class="fl"><img src="" alt="" background-color="{{value.img}}"><span>{{value.tag}}</span></a>--}}
        {{--<a href="#" class="fl"><h3>{{value.title}}</h3></a>--}}
        {{--<span>{{value.timing}}</span>--}}
        {{--<p>{{value.details}}</p>--}}
        {{--<div class="con-info">--}}
            {{--<span><i class="iconfont icon-yuedu"></i>&nbsp; 阅读 <del>{{value.reading}}</del></span>--}}
            {{--<em><i class="iconfont icon-shoucang"></i>&nbsp; 收藏--}}
                {{--<del>{{value.collect}}</del>--}}
            {{--</em>--}}
            {{--<strong><i class="iconfont icon-zan"></i>&nbsp; 被赞--}}
                {{--<del>{{value.zan}}</del>--}}
            {{--</strong>--}}
        {{--</div>--}}
    {{--</li>--}}
    {{--{{/each}}--}}
    {{--<a class="getMore" href="#">浏览更多</a>--}}
{{--</script>--}}
<!--热门文章页面模板拼接-->
{{--<script type="text/html" id="rmwz">--}}
{{--{{each list as value i}}--}}
{{--<li class="clearfix">--}}
    {{--<span>{{value.num}}.</span>--}}
    {{--<a href="#">--}}
        {{--<p>{{value.title}}</p>--}}
    {{--</a>--}}
    {{--<em><i class="iconfont icon-shoucang"></i>&nbsp; 收藏--}}
        {{--<del>{{value.collect}}</del>--}}
    {{--</em>--}}
    {{--<em><i class="iconfont icon-zan"></i>&nbsp; 点赞--}}
        {{--<del>{{value.zan}}</del>--}}
    {{--</em>--}}
{{--</li>--}}
{{--{{/each}}--}}
{{--</script>--}}
</body>
</html>