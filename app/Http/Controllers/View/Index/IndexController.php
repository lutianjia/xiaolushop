<?php


namespace App\Http\Controllers\View\Index;


use App\Entity\Images;
use App\Entity\User;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $category = getAllFirstCategory();
        unset($category[0]);
        $index = new \App\Http\Controllers\Api\IndexController();
        $tree = $index->getListTree();
        $account = session('retailer.account');
        $userId = session('retailer.id');
        $categoryList = $index->getThreeCategory();
        $products = $index->getThreeProduct();
        $brandList = $index->getThreeBrand();
        $sellProducts = $index->getSellingProducts();
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = session('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $index = new \App\Http\Controllers\Api\IndexController();
        $payMessage = $index->getOrderMessage($userId);
        $images = new Images();
        $image = $images->getAddImagesByCategory();
        $user = new User();
        $qqPro = $user->checkQqBind($id);
        return view("index/index")->with([
            'category' => $category,
            'tree' => $tree,
            'account' => $account,
            'phoneCategory' => $categoryList['phoneCategory'],
            'computerCategory' => $categoryList['computerCategory'],
            'applianceCategory' => $categoryList['applianceCategory'],
            'products' =>$products,
            'brandList' => $brandList,
            'sellProducts' => $sellProducts,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'payMessage' => $payMessage,
            'image' => $image,
            'qqPro' =>$qqPro,
        ]);
    }
}