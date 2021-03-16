<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listTree','IndexController@getListTree');//获取首页分页树
Route::get('threeCategory','IndexController@getThreeCategory');//获取手机数码、服装、家电类下的类别
Route::get('threeProduct','IndexController@getThreeProduct');//获取手机数码、服装、家电类的商品
Route::get('threeBrand','IndexController@getThreeBrand');//获取手机数码、服装、家电类的品牌

Route::get('product_detail/{id}','DetailController@getProductDetail');//获取商品详情
Route::get('product_related_detail/{id}','DetailController@getRelatedMessage');//获取相关商品详情
Route::get('get_selling_products','IndexController@getSellingProducts');//获取畅销商品详情
Route::get('category','IndexController@getCategory');//获取头部分类
Route::get('brand','ShopController@getAllBrand');//获取所有品牌
Route::get('shop/{brand_id}/{category_id}/{low_price}/{height_price}/{orderBy}/{pageCount}/{type}', 'ShopController@getShopProducts');//商品页获取条件下的商品
Route::get('publicProducts/{brand_id}/{category_id}', 'ShopController@getPublicProducts');//获取商品页的最畅销商品
Route::get('wish_add/{product_id}/{userId}/{userIp}', 'WishController@wishAdd');//添加心愿单
Route::get('get_cart_list/{id}', 'CartController@getCartList');//获取购物车列表
Route::get('get_cart_list/{id}', 'CartController@getCartList');//获取购物车列表
Route::get('address_add/{recipient}/{country}/{city}/{detail_address}', 'AddressController@addressAdd');//添加收获地址
