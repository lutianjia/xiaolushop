<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\View\Controller;

class MemberController extends Controller
{
    public function userList(){
        return view("admin/user_list");
    }

    public function memberGrading(){
        return view("admin/member-Grading");
    }

    public function integration(){
        return view("admin/integration");
    }
}