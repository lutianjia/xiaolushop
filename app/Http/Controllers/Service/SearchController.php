<?php


namespace App\Http\Controllers\Service;


use App\Entity\Brand;
use App\Entity\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $data = $request->input();
//        var_dump($data);exit;
        $brand = new Brand();
        if($data['brand_name'] != ''){
            $condition['brand_name'] = $data['brand_name'];
        }else{
            $condition['brand_name'] = '';
        }
        if($data['time'] != ''){
            $time = $data['time'];
        }else{
            $time = '';
        }
        if($data['brand'] == '1'){
            $condition['country'] = 'China';
        }else{
            $condition['country'] = '2';
        }
        $count = $brand->getBrandListCount($condition);
        $brand_list = $brand->getBrandList($count,$condition,$time);
        $countryCount = $brand->getBrandCountByCountryOrOverseas('China',$condition);
        $overseasCount = $brand->getBrandCountByCountryOrOverseas('overseas',$condition);
        return view("admin/Brand_Manage")->with([
            "brand_list" => $brand_list,
            "count" => $count,
            "countryCount" => $countryCount,
            "overseasCount" => $overseasCount,
            "brand_name" => $condition['brand_name'],
            "time" => $time,
            "country" => $condition['country'],
        ]);
    }

    public function productSearch(Request $request){
        $data = $request->input();
        unset($data['_token']);
        $product = new Products();
        $product_list = $product->getProductMessageByCondition($data);
        $count = sizeof($product_list);
        $result = productTypeList();
        $downCategory = productDownTypeList();
        return view("admin/Products_List")->with([
            'product_list' => $product_list,
            'downCategory' => $downCategory,
            'result' => $result,
            'count' => $count,
            "product_name" => $data['product_name'],
            "time" => $data['time'],
        ]);
    }
}