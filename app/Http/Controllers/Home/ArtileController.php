<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArtileController extends Controller
{
    public function newsList()
    {
        $news = DB::table('yws_news')->select('id','title','cover','content','updated_time')->orderBy('updated_time','desc')->get();
        return view('home/yws-headline',compact('news'));
    }
}