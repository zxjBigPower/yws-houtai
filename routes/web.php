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
});
