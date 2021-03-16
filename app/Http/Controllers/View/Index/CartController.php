<?php


namespace App\Http\Controllers\View\Index;


use App\Entity\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = $request->session()->get('retailer.id');
        if($id == ''){
            return redirect("/index/login");
        }
        $products = $cart->getCartList($id);
//        var_dump($products);exit;
        $totalPrice = 0;
        for($i=0;$i<count($products);$i++){
            $totalPrice += $products[$i]->productCount * $products[$i]->productPrice;
        }
        return view("index/cart")->with([
            'category' => $category,
            'account' => $account,
            'products' => $products,
            'totalPrice' => $totalPrice,
            'cartList' => $products,
            'cartCount' => count($products),
        ]);
    }
}