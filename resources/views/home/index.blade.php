<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>云温商</title>
    <link rel="stylesheet" href="{{url('home/lib/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('home/lib/css/bootstrap-theme.min.css')}}">
    <link rel="icon" href="{{url('home/yws.ico')}}">
    <link rel="stylesheet" href="{{url('home/css/public.css')}}">
    <link rel="stylesheet" href="{{url('home/css/common.css')}}">
    <link rel="stylesheet" href="{{url('home/css/index.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('home/lib/css/carousel.css')}}">
    <script src="{{asset('home/lib/js/jquery.1-11-1.js')}}"></script>
    <script src="{{asset('home/lib/js/jquery.carousel.js')}}"></script>
    <script src="{{asset('home/lib/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/index.js')}}"></script>
    <!--[if IE]>
    <script src="{{asset('home/lib/js/html5shiv.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<!--导航栏 start -->
<!--不兼容ie8-->
<!--<div class="nav">
    <div class="navbar navbar-default clearfix" border-bottom="1px solid #000">
        <div class="container-fluid">
            &lt;!&ndash; Brand and toggle get grouped for better mobile display &ndash;&gt;
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('')}}#"><img src="img/logo-1.png" alt=""></a>
            </div>

            &lt;!&ndash; Collect the nav links, forms, and other content for toggling &ndash;&gt;
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="nav-ul">
                    <li><a href="{{url('')}}#" class="border">首页</a></li>
                    <li><a href="{{url('')}}#">爆款定制</a></li>
                    <li><a href="{{url('')}}#">厂家直销</a></li>
                    <li><a href="{{url('')}}#">加盟代理</a></li>
                    <li><a href="{{url('')}}#">云温商头条</a></li>
                    <li><a href="{{url('')}}#">云温商金融 </a></li>
                    <li><a href="{{url('')}}#">关于我们</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('')}}#">免费注册</a></li>
                    <li><a href="{{url('')}}#">登录</a></li>
                </ul>
            </div>&lt;!&ndash; /.navbar-collapse &ndash;&gt;
        </div>&lt;!&ndash; /.container-fluid &ndash;&gt;
    </div>
</div>-->
<?php var_dump(session('ywsweb.user'))?>
<!--最简单的样式 -->
<div class="header clearfix">
    <div class="w">
        <div class="yws-logo fl"><a href="{{url('/')}}"><img src="{{asset('home/img/logo.png')}}" alt="" height="80px"></a></div>
        <ul id="nav-ul">
            <li><a href="{{url('/')}}" class="hover">首页</a></li>
            <li><a href="{{url('')}}#">爆款定制</a></li>
            <li><a href="{{url('')}}#">厂家直销</a></li>
            <li><a href="{{url('')}}yws-jmdl.html">加盟代理</a></li>
            <li><a href="{{url('')}}#">云温商头条</a></li>
            <li><a href="{{url('')}}#">云温商金融</a></li>
            <li><a href="{{url('')}}#">关于我们</a></li>
        </ul>
        <ol>
            @if(session('ywsweb.user'))
                <li><a href="javascript:;" class="yws-header-zc">你好！{{session('ywsweb.user')['username']}}</a></li>
                <li><a href="javascript:;" id="ywslogout">退出</a></li>
            @else
                <li><a href="{{url('register')}}" class="yws-header-zc">免费注册</a></li>
                <li><a href="{{url('login')}}">登录</a></li>
            @endif
        </ol>
    </div>
</div>
<!--导航栏 end-->
<!--轮播图 start-->
<!--不兼容ie8-->
<!--<div class="container">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            &lt;!&ndash; Indicators &ndash;&gt;
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            &lt;!&ndash; Wrapper for slides &ndash;&gt;
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="img/1.jpg" width="100%">
                    &lt;!&ndash; <div>这里div里面可以插入其他背景图，一般是img里面加小图在放超小屏显示，div放背景图在其他端口显示，不消耗内存</div>&ndash;&gt;
                    <div class="carousel-caption">
                        &lt;!&ndash;此处可添加其他模块&ndash;&gt;
                    </div>
                </div>
                <div class="item">
                    <img src="img/2.jpg" width="100%">
                    <div class="carousel-caption">
                        &lt;!&ndash;此处可添加其他模块&ndash;&gt;
                    </div>
                </div>
                <div class="item">
                    <img src="img/3.jpg" width="100%">
                    <div class="carousel-caption">
                        &lt;!&ndash;此处可添加其他模块&ndash;&gt;
                    </div>
                </div>
            </div>

            &lt;!&ndash; Controls &ndash;&gt;
            <a class="left carousel-control" href="{{url('')}}#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="{{url('')}}#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>-->
<!--最简单的样式 旋转木马-->
<div class="jq22-container">
    <div class = "caroursel poster-main"  id="caroursel"data-setting = '{
	        "width":1000,
	        "height":270,
	        "posterWidth":640,
	        "posterHeight":270,
	        "scale":0.8,
	        "dealy":"5000",
	        "algin":"middle"
	    }'>
        <ul class = "poster-list">
            <li class = "poster-item"><img src="{{asset('home/img/a1.png')}}" width = "100%" height="100%"></li>
            <li class = "poster-item"><img src="{{asset('home/img/a2.png')}}" width = "100%" height="100%"></li>
            <li class = "poster-item"><img src="{{asset('home/img/a3.png')}}" width = "100%" height="100%"></li>
        </ul>
        <div class = "poster-btn poster-prev-btn"></div>
        <div class = "poster-btn poster-next-btn"></div>
    </div>
</div>·
<!--轮播图 end-->
<!--logo start-->
<div class="logo clearfix">
        <div class="w"><h3>全网新零售，品牌温商Go</h3>
            <p>互联网终端全面覆盖，一键生成PC商城、iOS App、安卓App、H5微商城</p>
            <div class="logo-box ">
                <ul>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                    <li><a href="{{url('')}}#">
                        <img src="" alt="">
                        <span>定制</span>
                    </a></li>
                </ul>
            </div></div>
    </div>
<!--logo end-->
<!--goods start-->
<div class="goods clearfix">
        <div class="w">
            <h3>爆款定制、厂家直销</h3>
            <p>云温商-温商工厂帮助企业、个体工商户、个人高效开展新零售业务，并取得成功！</p>
            <div class="goods-box clearfix">
                <ul>
                    <li><a href="{{url('')}}#"><img src="" alt="">
                        <h5>这是商品标题</h5></a>
                        <p>这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍</p>
                        <span>&yen;这是商品价格</span>
                        <a href="{{url('')}}#" class="goods-button">查看详情</a>
                    </li>
                    <li><a href="{{url('')}}#"><img src="" alt="">
                        <h5>这是商品标题</h5></a>
                        <p>这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍</p>
                        <span>&yen;这是商品价格</span>
                        <a href="{{url('')}}#" class="goods-button">查看详情</a>
                    </li>
                    <li><a href="{{url('')}}#"><img src="" alt="">
                        <h5>这是商品标题</h5></a>
                        <p>这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍</p>
                        <span>&yen;这是商品价格</span>
                        <a href="{{url('')}}#" class="goods-button">查看详情</a>
                    </li>
                    <li><a href="{{url('')}}#"><img src="" alt="">
                        <h5>这是商品标题</h5></a>
                        <p>这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍</p>
                        <span>&yen;这是商品价格</span>
                        <a href="{{url('')}}#" class="goods-button">查看详情</a>
                    </li>
                    <li><a href="{{url('')}}#"><img src="" alt="">
                        <h5>这是商品标题</h5> </a>
                        <p>这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍这是商品介绍</p>
                        <span>&yen;这是商品价格</span>
                        <a href="{{url('')}}#" class="goods-button">查看详情</a>
                   </li>
                </ul>
            </div>
        </div>
    </div>
<!--goods end-->
<!--brand start -->
<div class="brand clearfix">
    <div class="w">
        <h3>10万+品牌商户倾力打造</h3>
        <p>温商工厂、爆款定制、厂家直批、 倾力打造新零售移动电商第一品牌</p>
        <div class="brand-box clearfix">
            <ul>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                    <li><a href="{{url('')}}#"><img src="" alt=""></a></li>
                </ul>
        </div>
    </div>
</div>
<!--brand end-->
<!--msg start -->
<div class="msg clearfix">
    <div class="w">
            <h3>云温商Mall 头条资讯</h3>
            <p>全球最新最全的温商品牌资讯、商户动态、商会信息</p>
            <div class="msg-box clearfix">
                <ul class="clearfix">
                    <li>
                        <a href="{{url('')}}#"><img src="" alt="">
                            <div class="msg-s-d">国内首个全球连锁微商平台</div>
                        </a>
                        <ol>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                        </ol>
                    </li>
                    <li>
                        <a href="{{url('')}}#"><img src="" alt="">
                            <div class="msg-s-d">国内首个全球连锁微商平台</div>
                        </a>
                        <ol>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                        </ol>
                    </li>
                    <li>
                        <a href="{{url('')}}#"><img src="" alt="">
                            <div class="msg-s-d">国内首个全球连锁微商平台</div>
                        </a>
                        <ol>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                            <li><a href="{{url('')}}#">
                                <p>国内首个全球连锁微商平台正式上线……</p>
                            </a></li>
                        </ol>
                    </li>
                </ul>
                <h2>云温商 - 温商工厂 - 爆款定制 - 新零售移动电商第一品牌</h2>
            </div>
        </div>
</div>
<!--msg end-->
<!--footer start-->
<div class="footer clearfix">
    <div class="w">
            <div class="footer-box clearfix fl">
                <ul class="fl">
                    <li>购物指南</li>
                    <li><a href="{{url('')}}#">购物流程</a></li>
                    <li><a href="{{url('')}}#">常见问题</a></li>
                    <li><a href="{{url('')}}#">提交订单</a></li>
                </ul>
                <ul class="fl">
                    <li>会员中心</li>
                    <li><a href="{{url('')}}#">会员介绍</a></li>
                    <li><a href="{{url('')}}#">实名中心</a></li>
                    <li><a href="{{url('')}}#">发票中心</a></li>
                </ul>
                <ul class="fl">
                    <li>配送方式</li>
                    <li><a href="{{url('')}}#">送货方式</a></li>
                    <li><a href="{{url('')}}#">服务查询</a></li>
                    <li><a href="{{url('')}}#">收费标准</a></li>
                </ul>
                <ul class="fl">
                    <li>服务中心</li>
                    <li><a href="{{url('')}}#">取消订单</a></li>
                    <li><a href="{{url('')}}#">联系客服</a></li>
                    <li><a href="{{url('')}}#">汇款信息</a></li>
                </ul>
                <ul class="fl">
                    <li>售后服务</li>
                    <li><a href="{{url('')}}#">关于我们</a></li>
                    <li><a href="{{url('')}}#">联系我们</a></li>
                    <li><a href="{{url('')}}#">服务地区</a></li>
                </ul>
                <ul class="fl">
                    <li>特色服务</li>
                    <li><a href="{{url('')}}#">取消订单</a></li>
                    <li><a href="{{url('')}}#">联系客服</a></li>
                    <li><a href="{{url('')}}#">汇款信息</a></li>
                </ul>
                <ul class="fl">
                    <li>关于云温商</li>
                    <li><a href="{{url('')}}#">关于我们</a></li>
                    <li><a href="{{url('')}}#">联系我们</a></li>
                    <li><a href="{{url('')}}#">服务地区</a></li>
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