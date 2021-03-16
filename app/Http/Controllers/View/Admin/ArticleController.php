<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\View\Controller;

class ArticleController extends Controller
{
    public function articleList(){
        return view("/admin/article_list");
    }

    public function articleAdd(){
        return view("/admin/article_add");
    }

    public function articleSort(){
        return view("/admin/article_Sort");
    }
}