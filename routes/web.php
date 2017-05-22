<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Home
Route::group(['middleware' => ['web'],'namespace'=>'Home'], function () {
    //官网首页
    Route::get('/','HomeController@home');
    //登录
    Route::any('login','HomeController@login');
    //退出登录
    Route::get('ywslogout','HomeController@logout');
    //注册
    Route::match(['get','post'],'register','HomeController@register');
    //comment
    //输出图片验证码
    Route::get('virify','Codecontroller@virify');
    //验证图片验证码
    Route::post('pcode','Codecontroller@pcode');
    //发送手机验证码
    Route::get('sendCode','HomeController@sendCode');
    //验证手机验证码
    Route::get('checkPhoneCode','HomeController@checkPhoneCode');
    //注册成功
    Route::post('register/complete',"HomeController@registerComplete");
    //找回密码
    Route::any('findpassworld',"HomeController@getPass");
    //确认修改密码
    Route::post('changpass',"HomeController@changPass");

    //新闻列表页面
    Route::get('news',"ArtileController@newsList");

});


//admin
Route::group(['namespace'=>'Admin','prefix'=>'ywsAdmin'],function(){
    //登录页面
    Route::get('ywsLogin','ywsAdminController@ywsLogin');
    Route::post('dologin','ywsAdminController@ywsDoLogin')->name('dologin');
    /*Route::group(['middleware'=>'ywsAdmin'],function(){

    });*/
    //后台首页
    Route::get('adminIndex','ywsAdminController@ywsIndex')->name('index');
    //文章管理===============================================================
    //文章列表
    Route::post('article','ywsArticleController@articleList')->name('article');
    //添加文章
    Route::post('article/add','ywsArticleController@articleAdd')->name('articleAdd');
    //执行添加
    Route::post('article/doadd','ywsArticleController@doArticleAdd')->name('doArticleAdd');
    //删除文章
    Route::get('article/dodel','ywsArticleController@doArticleDel')->name('doArticleDel');
    //审核文章
    Route::get('article/docheck','ywsArticleController@doArticleCheck')->name('doArticleCheck');
    //上下架
    Route::get('article/doline','ywsArticleController@doArticleLine')->name('doArticleAdd');
    //添加新闻分类fenlei
    Route::get('fenlei/doadd','ywsArticleController@doFenleiAdd');
    //排序分类
    Route::get('fenlei/doorderly','ywsArticleController@doFenleiOrderly');
    //分类列表
    Route::post('fenlei','ywsArticleController@fenlei');
    //删除分类
    Route::get('fenlei/dodel','ywsArticleController@doFenleiDel');

});
