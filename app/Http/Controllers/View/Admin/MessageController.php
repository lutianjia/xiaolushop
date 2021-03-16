<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\View\Controller;

class MessageController extends Controller
{
    public function guestBook(){
        return view("admin/Guestbook");
    }

    public function feedBack(){
        return view("admin/Feedback");
    }
}