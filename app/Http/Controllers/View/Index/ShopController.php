<?php


namespace App\Http\Controllers\View\Index;


use App\Entity\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(Request $request){
        $category = getAllFirstCategory();
        $account = $request->session()->get('retailer.account');
        $shop = new \App\Http\Controllers\Api\ShopController();
        $brandMessage = $shop->getAllBrand();
        $brand_id = $request->route('brand_id');
        $category_id = $request->route('category_id');
        $from = $request->route('from');

        $orderBy = $request->route('orderBy');
        $pageCount = $request->route('pageCount');
        $type = $request->route('type');
        $low_price = $request->input("low_price",'0');
        $height_price = $request->input("height_price",'0');
//        var_dump($pageCount);exit;
        if($low_price && $height_price){
            $brand_id = $request->input("brand_id",'0');
            $category_id = $request->input("category_id",'0');
            $page = $request->input("page",'0');
            $pageCount = $request->input("page_count",'0');
            $orderBy = $request->input("order_by",'0');
            $products = $shop->getShopProducts($brand_id,$category_id,$low_price,$height_price,$pageCount,$orderBy,$type,$page);
            return $products;
        }
        if($from == 'index'){
            $products = $shop->getShopProducts($brand_id,$category_id,0,0,12,0,'down',1,'index');
        }else{
            $products = $shop->getShopProducts($brand_id,$category_id,$low_price,$height_price,$pageCount,$orderBy,$type);
        }
        $paginate = $products->render();
//var_dump($products);
        $publicProducts = $shop->getPublicProducts($brand_id,$category_id);
        $cart = new \App\Http\Controllers\Api\CartController();
        $id = $request->session()->get('retailer.id');
        $cartList = $cart->getCartList($id);
//        var_dump(count($products));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $images = new Images();
        $image = $images->getAddImagesByCategory();
        return view("index/shop")->with([
            'category' => $category,
            'account' => $account,
            'brandMessage' => $brandMessage,
            'brand_id' => $brand_id,
            'category_id' => $category_id,
            'products' => $products,
            'paginate' => $paginate,
            "page_count" => $pageCount,
            "order_by" => $orderBy,
            "type" => $type,
            "publicProducts" => $publicProducts,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'image' => $image,
        ]);
    }
}