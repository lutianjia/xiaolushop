<?php


namespace App\Http\Controllers\View\Index;


use App\Http\Controllers\Api\WishController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function wishList(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $id = $request->session()->get('retailer.id');
        if($id == ''){
            return redirect("/index/login");
        }
        if($id){
            $wish = new WishController();
            $wishList = $wish->getWishList($id);
        }
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        return view("index/wishlist")->with([
            'category' => $category,
            'account' => $account,
            'wishList' => $wishList,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
        ]);
    }

}