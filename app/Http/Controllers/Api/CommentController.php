<?php


namespace App\Http\Controllers\Api;


use App\Entity\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function commentAdd($userId,$productId,$comment){
        $data['userId'] = $userId;
        $data['productId'] = $productId;
        $data['content'] = $comment;
        $result = Comment::create($data);
        return $result;
    }

    //获取商品评论
    public function getProductComment($productId){
        $comment = new Comment();
        $productComment = $comment->getProductCommentByProductId($productId);
        return $productComment;
    }
}