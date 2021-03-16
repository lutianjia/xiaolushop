<?php


namespace App\Http\Controllers\View\Admin;


use App\Http\Controllers\View\Controller;

class ShopController extends Controller
{
    public function shopList(){
        return view("admin/Shop_list");
    }

    public function shopsAudit(){
        return view("admin/Shops_Audit");
    }

    public function shoppingDetailed(){
        return view("admin/shopping_detailed");
    }
}