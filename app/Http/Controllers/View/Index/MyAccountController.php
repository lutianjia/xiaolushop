<?php


namespace App\Http\Controllers\View\Index;


use App\Entity\Address;
use App\Entity\Orders;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\OrderController;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function myAccount(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $addition = $request->route('addition');
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        return view("index/my_account")->with([
            'category' => $category,
            'account' => $account,
            'addition' => $addition,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
        ]);
    }

    public function accountDetails(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $addition = $request->route('addition');
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        return view("index/account_details")->with([
            'category' => $category,
            'account' => $account,
            'addition' => $addition,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
        ]);
    }

    public function addresses(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $addition = $request->route('addition'); $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $address = new Address();
        $addressList = $address->getAddressList($id);
        if(empty($addressList)){
            return view("index/address_shipping_details")->with([
                'category' => $category,
                'account' => $account,
                'addition' => $addition,
                'cartList' => $cartList,
                'totalPrice' => $totalPrice,
                'cartCount' => count($cartList),
                'addressMessage' => null,
            ]);
        }else{
            return view("index/addresses")->with([
                'category' => $category,
                'account' => $account,
                'addition' => $addition,
                'cartList' => $cartList,
                'totalPrice' => $totalPrice,
                'cartCount' => count($cartList),
                'addressList' => $addressList,
            ]);
        }

    }

    public function order(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $userId = $request->session()->get('retailer.id');
        $addition = $request->route('addition');
        $cart = new \App\Http\Controllers\Api\CartController();
        $order = new Orders();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $orderMessage = $order->getOrderMessageById($userId);
        return view("index/order")->with([
            'category' => $category,
            'account' => $account,
            'addition' => $addition,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'orderMessage' => $orderMessage,
        ]);
    }

    public function orderDetail(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $addition = $request->route('addition');
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $orderId = $request->route('orderId');
        $order = new OrderController();
        $orderMessage = $order->getOrderMessage($orderId);
        return view("index/order_detail")->with([
            'category' => $category,
            'account' => $account,
            'addition' => $addition,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'orderMessage' => $orderMessage,
        ]);
    }

    public function addressShippingDetails(Request $request){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $addition = $request->route('addition');
        $addressId = $request->route('id');
        $cart = new \App\Http\Controllers\Api\CartController();
        $address = new Address();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $addressMessage[0]=0;
        if ($addressId){
            $addressMessage = $address->getAddressMessage($addressId);
        }
        return view("index/address_shipping_details")->with([
            'category' => $category,
            'account' => $account,
            'addition' => $addition,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'addressMessage' => $addressMessage[0],
        ]);
    }
}