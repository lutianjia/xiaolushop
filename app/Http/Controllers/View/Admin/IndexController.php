<?php


namespace App\Http\Controllers\view\Admin;




use App\Http\Controllers\View\Controller;

class IndexController extends Controller
{
    public function index(){
        $result = $this->getAdminMessage();
        $role = $result->role;
        return view("admin/index")->with([
            'role' => $role,
        ]);
    }
}