<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\View\Controller;

class PayController extends Controller
{
    public function coverManagement(){
        return view("admin/Cover_management");
    }
}