<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ywsArticleController extends Controller
{
    //文章列表
    public function articleList()
    {
        return view('yws_admin.new_manage.new');
    }

    public function articleAdd()
    {
        return view('yws_admin.new_manage.newadd');
    }
}
