<?php


namespace App\Http\Controllers\View\Index;




use App\Entity\Product_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $account = $request->session()->get('retailer.account');
        $password = $request->session()->get('retailer.password');
        if($account && $password){
            $index = new IndexController();
            return $index->index();
        }
        return view("index/login");
    }

    public function register(){
        return view("index/register");
    }

    public function forget(){
        return view("index/forget");
    }

    public function repassword(){
        $id = $_GET['id'];
        return view("index/repassword")->with([
            'id' => $id,
        ]);
    }
}