<?php


namespace App\Http\Controllers\Service;


use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentAdd(Request $request){
        $productId = $request->input('productId','');
        $comment = $request->input('comment','');
        $userId = $request->session()->get('retailer.id');
        $commentController = new \App\Http\Controllers\Api\CommentController();
        $m3_result = new M3Result();
        $result = $commentController->commentAdd($userId,$productId,$comment);
        if($result){
            $m3_result->status = 0;
            $m3_result->data = $comment;
            $m3_result->message = '提交成功';
        }else{
            $m3_result->status = 1;
            $m3_result->message = '提交失败';
        }
        return $m3_result->toJson();
    }
}