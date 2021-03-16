<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'wish';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = ['id','created_at', 'updated_at'];

    //判断用户是否添加过该商品
    public function checkProductIsToken($userId,$productId){
        $result = Wish::where("userId",$userId)->where("productId",$productId)->count();
        return $result;
    }

    //搜索用户的心愿单
    public function getWishList($userId){
        $result = Wish::where("userId",$userId)->where("status" ,"=","1")->get();
        $result = json_decode($result);
        return $result;
    }
}