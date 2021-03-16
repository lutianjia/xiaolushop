<?php


namespace App\Http\Controllers\Service;


use App\Entity\Address;
use App\Entity\Orders;
use App\Entity\Pay;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderAdd(Request $request){
        $userId = $request->session()->get('retailer.id');
        $m3_result = new M3Result();
        if($userId == ''){
            $m3_result->status = -1;
            $m3_result->message = '请先登录！';
            return $m3_result->toJson();
        }
        $product_id = $request->input('id','');
        $product_count = $request->input('count','');
        $product_id = json_decode($product_id,true);
        $product_count = json_decode($product_count,true);
        $order = new \App\Http\Controllers\Api\OrderController();
        if(!is_array($product_id)){
            $orderId = $order->orderAdd($userId,$product_id,$product_count);
            $orderIds[0] = $orderId['id'];
        }else{
            for($i=0;$i<count($product_id);$i++){
                $orderId = $order->orderAdd($userId,$product_id[$i],$product_count[$i]);
                $orderIds[$i] = $orderId['id'];
            }
        }
        $orderIds = implode(',', $orderIds);
//        var_dump($orderIds);exit;
        if($orderId){
            if($orderId['isOrder'] == 1){
                $m3_result->status = 0;
                $m3_result->id = $orderIds;
                $m3_result->message = '该订单以生成,请及时支付';
            }else{
                $m3_result->status = 0;
                $m3_result->id = $orderIds;
                $m3_result->message = '订单已提交，请与24小时内完成支付';
            }
            return $m3_result->toJson();
        }
    }

    //结算
    public function pay(Request $request){
        $userId = $request->session()->get('retailer.id');
        $m3_result = new M3Result();
        if($userId == ''){
            $m3_result->status = -1;
            $m3_result->message = '请先登录！';
            return $m3_result->toJson();
        }
        $orderMessage = $request->input('orderMessage');
        $addressId = $request->input('addressId');
        $orderId = $request->input('orderId');
        $orderMessage = json_decode($orderMessage);
        $order = new \App\Http\Controllers\Api\OrderController();
        $result = $order->pay($userId,$orderMessage,$addressId,$orderId);
        if($result == 0){
            $m3_result->status = 1;
            $m3_result->message = '余额不足';
        }else{
            $m3_result->status = 0;
            $m3_result->message = '购买成功，请注意物流信息';
        }
        return $m3_result->toJson();
    }

    //获取订单详情
    public function getOrderMessage($orderId){
        $order= new Orders();
        $pay = new Pay();
        $address = new Address();
        $result = $pay->getOrderMessageByOrderId($orderId);
        if(empty($result[0])){
            $orderMessage = $order->getOrderMessageByOrderId($orderId);
            return $orderMessage;
        }else {
            $orderMessage = $order->getOrderMessageByOrderId($orderId);
            $addressMessage = $address->getAddressById($result[0]->addressId);
            $orderMessage['orderMessage'] = $orderMessage[0];
            $orderMessage['addressMessage'] = $addressMessage[0];
            unset($orderMessage[0]);
            return $orderMessage;
        }
    }
}