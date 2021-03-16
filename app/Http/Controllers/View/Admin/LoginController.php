<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $account = $request->session()->get('account');
        $password = $request->session()->get('password');
//        var_dump($password);exit;
        return view("admin/login")->with([
            "account" => $account,
            "password" => $password,
        ]);
    }
}