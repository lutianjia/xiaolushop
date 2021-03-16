<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\View\Controller;

class SystemController extends Controller
{
    public function systems(){
        return view("/admin/Systems");
    }

    public function systemLogs(){
        return view("/admin/System_Logs");
    }
}