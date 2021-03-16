<?php


namespace App\Http\Controllers\Api;




use App\Entity\Cart;
use App\Entity\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartAdd($product_id,$count,$userId,$userIp){
        $product = new Products();
        $cart = new Cart();
        $product_message = $product->getOneProductMessage($product_id);
        $result = $cart->checkProductIsToken($userId,$product_id);
        if($result != 0){
            return false;
        }
        $data['userId'] = $userId;
        $data['userIp'] = $userIp;
        $data['productId'] = $product_message['0']->id;
        $data['productName'] = $product_message['0']->product_name;
        $data['productPrice'] = $product_message['0']->current_price;
        $data['productImage'] = $product_message['0']->image;
        $data['productCount'] = $count;
        $data['status'] = 1;

        Cart::create($data);
        return true;
    }

    //获取购物车列表
    public function getCartList($id){
        $cart = new Cart();
        $products = $cart->getUserProducts($id);
        return $products;
    }
}