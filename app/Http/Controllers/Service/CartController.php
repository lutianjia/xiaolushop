<?php


namespace App\Http\Controllers\Service;


use App\Entity\Cart;
use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartAdd(Request $request){
        $product_id = $request->input('id','');
        $count = $request->input('count','');
        $from = $request->input('from','');
        $ip = $_SERVER["REMOTE_ADDR"];
        $account = $request->session()->get('retailer.account');
        $m3_result = new M3Result();
        if($account == ''){
            $m3_result->status = -1;
            $m3_result->message = '请先登录';
            return $m3_result->toJson();
        }
        $user = new User();
        $userMessage = $user->getMessageByAccount($account);
        $cart = new \App\Http\Controllers\Api\CartController();
        $result = $cart->cartAdd($product_id,$count,$userMessage[0]->id,$ip);
        if($result){
            if($from){
                $m3_result->status = 0;
                $m3_result->id = $product_id;
            }else{
                $m3_result->status = 0;
                $m3_result->message = '成功加入购物车';
            }
        }else{
            $m3_result->status = 1;
            $m3_result->message = '您的购物车中存在该商品';
        }

        return $m3_result->toJson();
    }

    public function changeCount(Request $request){
        $cartId = $request->input("cartId",'');
        $count = $request->input('count','');
        $cart = new Cart();
        $m3_result = new M3Result();
        $result = $cart->changeCount($cartId,$count);
        if($result){
            $id = $request->session()->get('retailer.id');
            $cart = new Cart();
            $products = $cart->getUserProducts($id);
//        var_dump(count($products));exit;
            $totalPrice = 0;
            for($i=0;$i<count($products);$i++){
                $totalPrice += $products[$i]->productCount * $products[$i]->productPrice;
            }
            $m3_result->status = 0;
            $m3_result->data = $totalPrice;
            return $m3_result->toJson();
        }
    }
}