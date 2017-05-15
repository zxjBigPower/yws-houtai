<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">言叶科技</a>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li style="padding: 0px 5px 0px 5px ;">{{ session('admin.name') }}</li>
                    <li><a href="{{ url('admin/index') }}">首页</a></li>
                    <li><a href="{{ url('admin/service/logout') }}">退出</a></li>

                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>