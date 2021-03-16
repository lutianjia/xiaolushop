<?php


namespace App\Http\Controllers\view\Admin;


use App\Entity\Brand;
use App\Entity\Product_category;
use App\Entity\Products;
use App\Http\Controllers\View\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function productList(Request $request){
        $product = new Products();
        $result = productTypeList();
        $downCategory = productDownTypeList();
        $product_list = $product->getProductMessageByCategory();
        $count = sizeof($product_list);

        $id = $request->input('id','');
        if($id){
            $product_list = $product->getProductMessageByCategory($id);
            return $product_list;
        }
        return view("admin/Products_List")->with([
            'result' => $result,
            'downCategory' => $downCategory,
            'product_list' => $product_list,
            'count' => $count,
            'product_name' => '',
            'time' => '',
        ]);
    }

    public function pictureAdd(Request $request){
        $result = productTypeList();
        $brand = new Brand();
        $brand_count = $brand->getBrandListCount();
        $brand_list = $brand->getBrandList($brand_count);
        $picture = new Products();
        $id = $request->input('id', '');
        if($id != ''){
            $message = $picture->getOneProductMessage($id);
            return $message;
        }

//        var_dump($brand_list);
        return view("/admin/picture-add")->with([
            'result' => $result,
            'brand_list' => $brand_list,
        ]);
    }

    public function brandManage(Request $request){
        $brand = new Brand();
        $count = $brand->getBrandListCount();
        $brand_list = $brand->getBrandList($count);
        $countryCount = $brand->getBrandCountByCountryOrOverseas('China');
        $overseasCount = $brand->getBrandCountByCountryOrOverseas('overseas');
        if($request->input('from')){
            $data['countryCount'] = $countryCount;
            $data['overseasCount'] = $overseasCount;
            return json_encode($data);
        }
        return view("admin/Brand_Manage")->with([
            "brand_list" => $brand_list,
            "count" => $count,
            "countryCount" => $countryCount,
            "overseasCount" => $overseasCount,
            "brand_name" => '',
            "time" => '',
            "country" => '',
        ]);
    }

    public function addBrand(Request $request){
        $id = $request->input("id", "");
        $brand = new Brand();
        $result = $brand->getOneBrandMessage($id);
        $result = json_decode($result);
//        var_dump($result);
        if($id != ''){
            return $result;
        }
        return view("/admin/Add_Brand");
    }

    public function categoryManage(Request $request){
        $result = productTypeList();
        $downCategory = productDownTypeList();
//        var_dump($downCategory);exit;
        $category_name = $request->input("category_name","");
        $id = $request->input("id","");
        if($category_name){
            $productCategory = new Product_category();
            $downName = $productCategory->getDownParentName($category_name);
            $category_id = $downName[0]->id;
            $categoryDownName = $productCategory->getDownName($category_id);
            $categoryDownName[] = $id;
            $childernCount = $productCategory->getChindrenCount($category_id);
            $categoryDownName[] = $childernCount;
//            var_dump(json_decode($categoryDownName));
            return $categoryDownName;
        }
        return view("admin/Category_Manage")->with([
            'result' => $result,
            'downCategory'=>$downCategory,
        ]);
    }

    public function productCategoryAdd(){
        return view("admin/product-category-add");
    }

    public function brandDetail(Request $request){
        $id = $request->get('id');
        $brand = new Brand();
        $detail = $brand->getOneBrandMessage($id);
        $count = $brand->getOneBrandDownProductCount($id);
        $message = $brand->getOneBrandDownProductMessage($id);
        return view("admin/Brand_detailed")->with([
            'detail' => $detail[0],
            'count' => $count,
            'message' => $message,
        ]);
    }
}