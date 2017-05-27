<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">云温商</a> <p>官网后台管理系统</p>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl" id="nav-ul">
                    <li><a class="click" href="{{route('index')}}">首页</a></li>
                    <li><a href="javascript:;">栏目管理</a></li>
                    <li><a href="javascript:;" name=" {{url('ywsAdmin/article') }}" onclick="showChild(this,1);">内容管理</a></li>
                    <li><a href="javascript:;">广告管理</a></li>
                    <li><a href="javascript:;" name=" {{url('ywsAdmin/article') }}" onclick="showChild(this,2)">会员管理</a></li>
                    <li><a href="javascript:;">权限管理</a></li>
                    <li><a href="javascript:;">系统管理</a></li>
                    <li style="padding: 0px 5px 0px 5px ;"></li>
                    <li><a href="{{ url('/') }}" target="_blank"> 浏览网站</a></li>
                    <li><a href="javascript:;">修改密码</a></li>
                    {{--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>--}}
                    <li>
                        <ul>
                            <li>欢迎您</li>
                            {{--<li></li>--}}
                            <li><a href="#">[安全退出]</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>