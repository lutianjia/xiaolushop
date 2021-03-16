<?php


namespace App\Http\Controllers\Api;


use App\Entity\Cart;
use App\Entity\Products;
use App\Entity\Wish;
use App\Http\Controllers\Controller;

class WishController extends Controller
{
    public function wishAdd($product_id,$userId,$userIp){
        $product = new Products();
        $wish = new Wish();
        $product_message = $product->getOneProductMessage($product_id);
        $result = $wish->checkProductIsToken($userId,$product_id);
        if($result != 0){
            return false;
        }
        $data['userId'] = $userId;
        $data['userIp'] = $userIp;
        $data['productId'] = $product_message['0']->id;
        $data['productName'] = $product_message['0']->product_name;
        $data['productPrice'] = $product_message['0']->current_price;
        $data['status'] = 1;

        $result = Wish::create($data);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //获取心愿单列表
    public function getWishList($id){
        $wish = new Wish();
        $products = $wish->getWishList($id);
        for($i=0;$i<count($products);$i++){
            $count = $this->getProductCount($products[$i]->productId);
            $products[$i]->count = $count->wareHouseCount;
            $inCart = $this->judgeIsInCart($products[$i]->productId);
            if(!empty($inCart[0])){
                $products[$i]->inCart = true;
            }else{
                $products[$i]->inCart = false;
            }
        }
        return $products;
    }

    //查看商品是否有货
    public function getProductCount($id){
        $result = Products::where("id",$id)->select("wareHouseCount")->get();
        $result = json_decode($result);
        return $result[0];
    }

    //判断商品是否在购物车中
    public function judgeIsInCart($id){
        $result = Cart::where("productId",$id)->select("id")->where('status',1)->get();
        $result = json_decode($result);
        return $result;
    }
}