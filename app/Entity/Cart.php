<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = ['id','created_at', 'updated_at'];

    //判断用户是否添加过该商品
    public function checkProductIsToken($userId,$productId){
        $result = Cart::where("userId",$userId)->where("productId",$productId)->where('status',1)->count();
        return $result;
    }

    //搜索用户添加的商品
    public function getUserProducts($userId){
        $result = Cart::where("userId",$userId)->where("status" ,"=","1")->get();
        $result = json_decode($result);
        return $result;
    }

    //修改cart商品数量
    public function changeCount($cartId,$count){
        $data['productCount'] = $count;
        $result = Cart::where("id", $cartId)->update($data);
        $result = json_decode($result);
        return $result;
    }
}