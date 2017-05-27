<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" href="{{url('Home/yws.ico')}}">
    {{--========================================================--}}

    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('yws_admin/lib/html5.js')}}"></script>
    <script type="text/javascript" src="{{ asset('yws_admin/lib/respond.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('yws_admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('yws_admin/static/h-ui/css/H-ui.min.css')}}" />
    {{--<link rel="stylesheet" type="text/css" href="{{asset('index/css/bootstrap.css')}}" />--}}
    <link rel="stylesheet" type="text/css" href="{{asset('yws_admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('yws_admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('yws_admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{asset('yws_admin/static/h-ui.admin/css/style.css')}}" />
    <link href="{{asset('yws_admin/static/h-ui.admin/css/H-ui.login.css')}}" rel="stylesheet" type="text/css" />
    <!--[if IE 6]-->

    <!--===================================================-->
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <!--[endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>云温商后台管理</title>
    {{--@yield('css')--}}
</head>
<body class="big-page">
<!--_header 作为公共模版分离出去-->
@yield('header')
<!--/_header 作为公共模版分离出去-->

    <!--_menu部分-->
@yield('menu')
<!--/_menu部分-->
{{--内容部分--}}
@yield('content')
{{--内容部分--}}



<!--_footer 作为公共模版分离出去-->


{{--=================================--}}
<script type="text/javascript" src="{{asset('yws_admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('yws_admin/static/h-ui/js/H-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('yws_admin/static/h-ui.admin/js/H-ui.admin.page.js')}}"></script>
<!--/_footer /作为公共模版分离出去-->
{{--@yield('js')--}}
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    //执行load方法
    function chengeLinkLoad(linkload,data){
        // alert(linkload);
//console.log(1);
        var  rdata=data+'&_token='+"{{csrf_token()}}";
        //console.log(rdata);
        $.post(linkload,rdata,function(result){
            $('section').html(result);
        });//post
        var page = encodeURIComponent(data,true);
        var url = location.pathname + '?page=' + page;
        //console.log('...')
        history.pushState(//history.pushState  创建新的历史记录条目
            linkload,'',url);//linkload是load请求的地址，URL是生成的地址
    }

    function showChild(obj,id)
    {
        $('#leftmenue').css('display','block');

        if(id !== false){
            var url = $(obj).attr('name');
            var param = "param="+"left"+parseInt(500*Math.random());
            //var param = "param="+"left"
            $('#leftmenue').removeClass("open");
            $("body").removeClass("big-page");
            $("aside ul li").css('display','none');
            $("."+id).css('display','block');
            chengeLinkLoad(url,param);
        }else{
            var url = $(obj).attr('name');
            var param = "param="+"left"+parseInt(500*Math.random());
            //var param = "param="+"left"
            chengeLinkLoad(url,param);
        }
    }
    //头部的点击变色
//console.log($("#nav-ul").children("li"));
$("#nav-ul").children("li").on("click",function(){
    //console.log($(this));
    $(this).find("a").addClass("click");
    $(this).siblings("li").find("a").removeClass("click")
    //console.log(1);
})
//侧栏的点击变色
console.log($("#sidebar-ul"));
$("#sidebar-ul").children("li").on("click",function(){
    $(this).find("a").addClass("click");
    $(this).siblings("li").find("a").removeClass("click")
})
</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>