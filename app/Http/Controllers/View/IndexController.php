<?php


namespace App\Http\Controllers\View;


use Illuminate\Http\Request;

class IndexController extends \App\Http\Controllers\Controller
{
    public function __construct(\Illuminate\Http\Request $request)
    {
        //判断用户是否登录
        $account = $request->session()->get('retailer.account');

        if(!$account){
            redirect('index/login')->send();
        }
    }

}