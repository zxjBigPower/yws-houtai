@extends('yws_admin.master')
@section('header')
    @include('yws_admin.header')
@endsection
@section('menu')
    @include('yws_admin.menu')
@endsection
@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a>
            <span class="c-999 en">&gt;</span>
            <span class="c-666">我的桌面</span>
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <p class="f-20 text-success">网站统计 Site Stats
                   </p>
               <table class="table table-border table-bordered table-bg">
                    <tbody>
                    <tr class="text-c">
                        <td rowspan="4">会员统计</td>
                        <td rowspan="2">会员总数</td>
                        <td>今日新增用户</td>
                        <td>本周新增用户</td>
                        <td>本月新增用户</td>
                    </tr>
                    <tr class="text-c">
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr class="text-c">
                        <td rowspan="2">0</td>
                        <td>昨天新增用户</td>
                        <td>上周新增用户</td>
                        <td>上月新增用户</td>
                    </tr>
                    <tr class="text-c">
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-border table-bordered table-bg">
                                   <tbody>
                                   <tr class="text-c">
                                       <td rowspan="4">咨讯统计</td>
                                       <td rowspan="2">文章总数</td>
                                       <td rowspan="2">栏目总数</td>
                                       <td>阅读总数</td>
                                       <td>收藏总数</td>
                                   </tr>
                                   <tr class="text-c">

                                       <td>0</td>
                                       <td>0</td>
                                   </tr>
                                   <tr class="text-c">
                                       <td rowspan="2">0</td>
                                       <td rowspan="2">1</td>
                                       <td>点赞总数</td>
                                       <td>分享总数</td>
                                   </tr>
                                   <tr class="text-c">
                                       <td>0</td>
                                       <td>0</td>
                                   </tr>
                                   </tbody>
                               </table>
               <table class="table table-border table-bordered table-bg">
                   <thead>
                    <tr>
                      <th colspan="7" scope="col">个人信息 Profile Info</th>
                          </thead>
                          <tbody>
                          <tr class="text-c">
                                 <td>会员名</td>
                                 <td>最后登录时间</td>
                                 <td>登陆次数</td>
                             </tr>
                             <tr class="text-c">
                                 <td>admin</td>
                                 <td>2017-05-12 13:17:47</td>
                                 <td>2864</td>
                             </tr>
                             <tr class="text-c">
                                 <td>会员组</td>
                                 <td colspan="2">最后登陆IP/地址</td>
                             </tr>
                             <tr class="text-c">
                                 <td>超级管理员</td>
                                 <td colspan="2">59.172.229.50 / 湖北省武汉市 电信</td>
                             </tr>
                             </tbody>
                         </table>
               <table class="table table-border table-bordered table-bg">
                    <thead>
                    <tr>
                        <th colspan="7" scope="col">系统信息 System Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-c">
                        <td>运行环境</td>
                        <td> PHP运行方式</td>
                        <td>MYSQL版本</td>
                    </tr>
                    <tr class="text-c">
                        <td>Linux nginx/1.10.1</td>
                        <td> cgi-fcgi</td>
                        <td>5.7.17</td>
                    </tr>
                    <tr class="text-c">
                        <td>上传附件限制</td>
                        <td>执行时间限制</td>
                        <td>磁盘剩余空间</td>
                    </tr>
                    <tr class="text-c">
                        <td>2M</td>
                        <td> 30秒</td>
                        <td>6465.68M</td>
                    </tr>
                    </tbody>
               </table>
            </article>
        </div>
    </section>
@endsection