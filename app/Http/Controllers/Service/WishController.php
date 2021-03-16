<?php


namespace App\Http\Controllers\Service;


use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function wishAdd(Request $request){
        $product_id = $request->input('id','');
        $ip = $_SERVER["REMOTE_ADDR"];
        $account = $request->session()->get('retailer.account');
        $m3_result = new M3Result();
        if($account == ''){
            $m3_result->status = 1;
            $m3_result->message = '请先登录';
            return $m3_result->toJson();
        }
        $user = new User();
        $userMessage = $user->getMessageByAccount($account);
        $wish = new \App\Http\Controllers\Api\WishController();
        $result = $wish->wishAdd($product_id,$userMessage[0]->id,$ip);
        if($result){
            $m3_result->status = 0;
            $m3_result->message = '成功加入心愿单';
        }else{
            $m3_result->status = 1;
            $m3_result->message = '您的心愿单中存在该商品';
        }

        return $m3_result->toJson();
    }
}