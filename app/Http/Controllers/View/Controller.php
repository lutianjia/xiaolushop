<?php


namespace App\Http\Controllers\View;



use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
    public function __construct(\Illuminate\Http\Request $request)
    {
        //判断用户是否登录
        $result = $request->session()->get('member');

        if(!$result){
            redirect('admin/login')->send();
        }
    }

    public function getAdminMessage(){
        $result = session('member');
        return $result;
    }
}