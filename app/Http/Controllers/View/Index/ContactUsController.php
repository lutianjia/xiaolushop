<?php


namespace App\Http\Controllers\View\Index;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        return view("index/contact_us")->with([
            'category' => $category,
            'account' => $account,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
        ]);
    }
}