<?php


namespace App\Http\Controllers\View\Index;


use App\Entity\Address;
use App\Entity\Orders;
use App\Entity\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkOut(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $order_id = $request->route('id');
        $order_id = explode(",", $order_id);
        $id = session('retailer.id');
        $order = new Orders();
        if($order_id[0] != ''){
            for($i=0;$i<count($order_id);$i++){
                $productMes = $order->getOneOrderMessage($order_id[$i]);
                $productMessage[$i] = $productMes[0];
            }
            $orderTotalPrice = 0;
            for ($i=0;$i<count($productMessage);$i++){
                $orderTotalPrice += $productMessage[$i]->product_count * $productMessage[$i]->product_price;
                $order_id[$i] = $productMessage[$i]->orderId;
            }
        }else{
            if($id != ''){
                $productMessage = $order->getOrderMessage($id);
                $orderTotalPrice = 0;
                for ($i=0;$i<count($productMessage);$i++){
                    $orderTotalPrice += $productMessage[$i]->product_count * $productMessage[$i]->product_price;
                    $order_id[$i] = $productMessage[$i]->orderId;
                }
            }else{
                return redirect("/index/login");
            }
        }
        $cart = new \App\Http\Controllers\Api\CartController();

        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $address = new Address();
        $addressList = $address->getAddressList($id);
        return view("index/checkout")->with([
            'category' => $category,
            'account' => $account,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'addressList' => $addressList,
            'productMessage' => $productMessage,
            'orderTotalPrice' => $orderTotalPrice,
            'orderId' => $order_id,
        ]);
    }
}