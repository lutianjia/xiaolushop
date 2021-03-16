<?php


namespace App\Http\Controllers\Api;


use App\Entity\Products;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    //获取商品详情
    public function getProductDetail($id){
        $product = new Products();
        $message = $product->getOneProductMessage($id);
        return $message;
    }

    //获取相关商品信息
    public function getRelatedMessage($id){
        $result = Products::where("category_id",$id)->select("id","image","viewCount","product_name","original_price","current_price")->get();
        $result = json_decode($result);
        return $result;
    }


}