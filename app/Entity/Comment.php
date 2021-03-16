<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = ['id','created_at', 'updated_at'];

    //通过商品id获取评论
    public function getProductCommentByProductId($productId){
        $result = Comment::where('productId','=',$productId)->get();
        $result = json_decode($result);
        return $result;
    }
}