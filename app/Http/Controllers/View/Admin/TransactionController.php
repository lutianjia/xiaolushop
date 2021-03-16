<?php


namespace App\Http\Controllers\view\Admin;


use App\Entity\Orders;
use App\Entity\Pay;
use App\Http\Controllers\View\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction(Request $request){
        $pay = new Pay();
        $order = new Orders();
        $totalPrice = $pay->getTotalPrice();
        $orderCount = $order->getOrderCount();
        $payCount = $pay->getPayCount();
        $orderFailCount = $order->getOrderFailCount();
        $months = $this->getMonths();
        $orderCountByMonth = $order->getOrderCountByMonth();
        if($request->input('from','')){
            $data['totalPrice'] = $totalPrice;
            $data['orderCount'] = $orderCount;
            $data['payCount'] = $payCount;
            $data['orderFailCount'] = $orderFailCount;
            $data['orderCountByMonth'] = $orderCountByMonth;
            return json_encode($data);
        }
        return view("admin/transaction")->with([
            'totalPrice' => $totalPrice,
            'orderCount' => $orderCount,
            'payCount' => $payCount,
            'orderFailCount' => $orderFailCount,
            'months' => $months,
            'orderCountByMonth' => $orderCountByMonth,
        ]);
    }

    //获取本年已经过的月份
    public function getMonths(){
        $a = date('m');
        for($i=1;$i<($a+1);$i++){
            $date[] = $i.'月';
        }
        $date = json_encode($date);
        return $date;
    }

    public function orderChart(){
        return view("admin/Order_Chart");
    }

    public function orderForm(){
        return view("admin/Orderform");
    }

    public function amounts(){
        return view("admin/Amounts");
    }

    public function orderHandling(){
        return view("admin/Order_handling");
    }

    public function refund(){
        return view("admin/Refund");
    }
}