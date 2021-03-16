<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','View\Index\IndexController@index');

Route::group(['prefix' => 'admin'], function(){
    Route::get('login','View\Admin\LoginController@login');
    Route::get('index','View\Admin\IndexController@index');
    Route::get('home','View\Admin\HomeController@home');
    Route::get('product_list','View\Admin\ProductController@productList');
    Route::post('product_list','View\Admin\ProductController@productList');
    Route::get('picture_add','View\Admin\ProductController@pictureAdd');
    Route::post('picture_add','View\Admin\ProductController@pictureAdd');
    Route::get('brand_manage','View\Admin\ProductController@brandManage');
    Route::post('brand_manage','View\Admin\ProductController@brandManage');
    Route::get('add_brand','View\Admin\ProductController@addBrand');
    Route::post('add_brand','View\Admin\ProductController@addBrand');
    Route::get('category_manages','View\Admin\ProductController@categoryManage');
    Route::post('category_manages','View\Admin\ProductController@categoryManage');
    Route::get('product-category-add','View\Admin\ProductController@productCategoryAdd');
    Route::get('brand_detail','View\Admin\ProductController@brandDetail');
    Route::get('advertising/{category_id?}','View\Admin\PictureController@advertising');
    Route::get('sort_ads','View\Admin\PictureController@sortAds');
    Route::get('ads_list','View\Admin\PictureController@adsList');
    Route::get('transaction','View\Admin\TransactionController@transaction');
    Route::post('transaction','View\Admin\TransactionController@transaction');
    Route::get('order_chart','View\Admin\TransactionController@orderChart');
    Route::get('order_form','View\Admin\TransactionController@orderForm');
    Route::get('amounts','View\Admin\TransactionController@amounts');
    Route::get('order_handling','View\Admin\TransactionController@orderHandling');
    Route::get('refund','View\Admin\TransactionController@refund');
    Route::get('cover_management','View\Admin\PayController@coverManagement');
    Route::get('user_list','View\Admin\MemberController@userList');
    Route::get('member_grading','View\Admin\MemberController@memberGrading');
    Route::get('integration','View\Admin\MemberController@integration');
    Route::get('shop_list','View\Admin\ShopController@shopList');
    Route::get('shops_audit','View\Admin\ShopController@shopsAudit');
    Route::get('shopping_detailed','View\Admin\ShopController@shoppingDetailed');
    Route::get('guest_book','View\Admin\MessageController@guestBook');
    Route::get('feed_back','View\Admin\MessageController@feedBack');
    Route::get('article_list','View\Admin\ArticleController@articleList');
    Route::get('article_add','View\Admin\ArticleController@articleAdd');
    Route::get('article_sort','View\Admin\ArticleController@articleSort');
    Route::get('systems','View\Admin\SystemController@systems');
    Route::get('system_logs','View\Admin\SystemController@systemLogs');
    Route::get('admin_competence','View\Admin\AdminController@adminCompetence');
    Route::get('competence','View\Admin\AdminController@competence');
    Route::get('administrator','View\Admin\AdminController@administrator');
    Route::get('admin_info','View\Admin\AdminController@adminInfo');
});
Route::group(['prefix' => 'service'], function(){
    Route::get('validate_code/create','Service\ValidateController@create');
    Route::get('validate_email','Service\ValidateController@validateEmail');
    Route::post('login','Service\LoginController@login');
    Route::get('qqlogin','Service\LoginController@qqLogin');
    Route::get('qq_callback','Service\LoginController@qqCallback');
    Route::post('index_register','Service\LoginController@indexRegister');
    Route::post('index_login','Service\LoginController@indexLogin');
    Route::post('login_out','Service\LoginController@loginOut');
    Route::get('index_login_out','Service\LoginController@indexLoginOut');
    Route::post('get_email','Service\LoginController@getEmail');
    Route::post('changePassword','Service\LoginController@changePassword');
    Route::post('category_add','Service\ProductController@product_category_add');
    Route::post('product_add','Service\ProductController@product_add');
    Route::post('change_status','Service\ChangeStatusController@changeStatus');
    Route::post('upload','Service\UploadController@upload');
    Route::post('brand_add','Service\BrandController@brandAdd');
    Route::post('search','Service\SearchController@search');
    Route::post('product_search','Service\SearchController@productSearch');
    Route::post('change_password','Service\AdminController@changePassword');
    Route::post('change_message','Service\AdminController@changeMessage');
    Route::post('add_picture_category','Service\PictureController@addPictureCategory');
    Route::post('image_add','Service\PictureController@imageAdd');
    Route::post('change_sort','Service\PictureController@changeSort');
    Route::post('cart_add','Service\CartController@cartAdd');
    Route::post('change_count','Service\CartController@changeCount');
    Route::post('wish_add','Service\WishController@wishAdd');
    Route::post('address_add','Service\AddressController@addressAdd');
    Route::post('order_add','Service\OrderController@orderAdd');
    Route::post('pay','Service\OrderController@pay');
    Route::post('comment_add','Service\CommentController@commentAdd');
});

Route::group(['prefix' => 'index'], function() {
    Route::get('cart', 'View\Index\CartController@cart');
    Route::get('checkout', 'View\Index\CheckOutController@checkOut');
    Route::get('checkout/{id}', 'View\Index\CheckOutController@checkOut');
    Route::get('my_account/addition/{addition}', 'View\Index\MyAccountController@myAccount');
    Route::get('account_details/addition/{addition}', 'View\Index\MyAccountController@accountDetails');
    Route::get('addresses/addition/{addition}', 'View\Index\MyAccountController@addresses');
    Route::get('order/addition/{addition}', 'View\Index\MyAccountController@order');
    Route::get('order_detail/addition/{addition}/{orderId?}', 'View\Index\MyAccountController@orderDetail');
    Route::get('address_shipping_details/addition/{addition}','View\Index\MyAccountController@addressShippingDetails');
    Route::get('address_shipping_details/addition/{addition}/{id}','View\Index\MyAccountController@addressShippingDetails');
    Route::get('shop/brand_id/{brand_id}/category_id/{category_id}/orderBy/{orderBy}/pageCount/{pageCount}/type/{type}/{from?}', 'View\Index\ShopController@shop');
    Route::post('shop', 'View\Index\ShopController@shop');
    Route::get('about_us', 'View\Index\AboutUsController@aboutUs');
    Route::get('contact_us', 'View\Index\ContactUsController@contactUs');
    Route::get('simple_product/{id}', 'View\Index\SimpleProductController@simpleProduct');
    Route::get('login', 'View\Index\LoginController@login');
    Route::get('register', 'View\Index\LoginController@register');
    Route::get('forget', 'View\Index\LoginController@forget');
    Route::get('repassword', 'View\Index\LoginController@repassword');
    Route::get('wish_list', 'View\Index\WishListController@wishList');

});