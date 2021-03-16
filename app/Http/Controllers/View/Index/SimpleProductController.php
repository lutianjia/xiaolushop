<?php


namespace App\Http\Controllers\View\Index;


use App\Entity\Products;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\DetailController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpleProductController extends Controller
{
    public function simpleProduct(Request $request,$id){
        $category = getAllFirstCategory();
        unset($category[0]);
        $account = $request->session()->get('retailer.account');
        $detail = new DetailController();
        $productDetail = $detail->getProductDetail($id);
        $category_id = $productDetail[0]->category_id;
        $relatedProduct = $detail->getRelatedMessage($category_id);
        $cart = new \App\Http\Controllers\Api\CartController();
        $UserId = session('retailer.id');
        $cartList = $cart->getCartList($UserId);
//        var_dump(count($cartList));exit;
        $totalPrice = 0;
        for($i=0;$i<count($cartList);$i++){
            $totalPrice += $cartList[$i]->productCount * $cartList[$i]->productPrice;
        }
        $comment = new CommentController();
        $commentMessage = $comment->getProductComment($id);
        $product = new Products();
        $product->changeViewCount($account,$id);
        return view("index/simple_product")->with([
            'category' => $category,
            'account' => $account,
            'productDetail' => $productDetail[0],
            'relatedProduct' => $relatedProduct,
            'cartList' => $cartList,
            'totalPrice' => $totalPrice,
            'cartCount' => count($cartList),
            'commentMessage' => $commentMessage,
        ]);
    }
}