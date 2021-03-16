<?php


namespace App\Http\Controllers\view\Admin;




use App\Http\Controllers\View\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $message = $this->getAdminMessage();
        $result = DB::table('admin')->where('id',$message->id)->first();
        $login_time = $result->login_time;
        $ip = $result->ip;
        return view("admin/home")->with([
            'login_time' => $login_time,
            'ip' => $ip,
        ]);
    }
}