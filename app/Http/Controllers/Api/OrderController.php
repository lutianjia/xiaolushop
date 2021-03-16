<?php


namespace App\Http\Controllers\Api;


use App\Entity\Orders;
use App\Entity\Pay;
use App\Entity\Products;
use App\Entity\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderAdd($userId,$productId,$productCount){
        $product = new Products();
        $order = new Orders();
        $isOrder = $order->getIsOrder($userId,$productId);
        if(!empty($isOrder[0])){
            $isOrderData['id'] = $isOrder[0]->id;
            $isOrderData['isOrder'] = 1;
            return $isOrderData;
        }
        $productMessage = $product->getOneProductMessage($productId);

        $orderId = $this->createOrderNm();
        $data['orderId'] = $orderId;
        $data['userId'] = $userId;
        $data['product_id'] = $productId;
        $data['product_name'] = $productMessage[0]->product_name;
        $data['product_price'] = $productMessage[0]->current_price;
        $data['product_count'] = $productCount;
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['status'] = 0;
        $id = DB::table('orders')->insertGetId($data);
        $isOrderData['id'] = $id;
        $isOrderData['isOrder'] = 0;
        return $isOrderData;
    }

    //创建订单号
    public function createOrderNm(){
        $year_code = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $date_code = array('0',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A',
            'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'T', 'U', 'V', 'W', 'X', 'Y');
        //一共15位订单号,同一秒内重复概率1/10000000,26年一次的循环\
        $order_sn = $year_code[(intval(date('Y')) - 2010) % 26] . //年 1位
            strtoupper(dechex(date('m'))) . //月(16进制) 1位
            $date_code[intval(date('d'))] . //日 1位
            substr(time(), -5) . substr(microtime(), 2, 5) . //秒 5位 // 微秒 5位
            sprintf('%02d', rand(0, 99)); //  随机数 2位
        return $order_sn;
    }

    //结算
    public function pay($userId,$orderMessage,$addressId,$orderId){
        $product = new Products();
        $order = new Orders();
        for($i=0;$i<count($orderMessage);$i++){
            $count = $product->getOneProductPrice($orderMessage[$i]->id);

            $orderMessage[$i]->price = $count[0]->current_price;
        }
        $orderTotalPrice = 0;
        for($i=0;$i<count($orderMessage);$i++){
            $orderTotalPrice += $orderMessage[$i]->count * $orderMessage[$i]->price;
        }
        $user = new User();
        $money = $user->getPriceById($userId);
        if ($orderTotalPrice>$money[0]->money){
            return 0;//钱不够
        }else{
            // 开启事务
            DB::beginTransaction();
            try {
                $downMoneyResult = $user->changeMoney($userId,-$orderTotalPrice);
                $upMoneyResult = $user->changeMoney(1,$orderTotalPrice);
                // 提交事务
                DB::commit();
            } catch (Exception $e) {
                // 数据回滚, 当try中的语句抛出异常。
                DB::rollBack();
                // 执行一些提醒操作等等...
            }
            if($downMoneyResult&&$upMoneyResult){
                for($i=0;$i<count($orderId);$i++){
                    $order->updateOrderStatus($orderId[$i]);
                }

                $orderId = implode($orderId,',');
                $data['userId'] = $userId;
                $data['orderId'] = $orderId;
                $data['addressId'] = $addressId;
                $data['money'] = $orderTotalPrice;
                $result = Pay::create($data);
                if($result){
                    return true;
                }
            }
        }
    }
}














