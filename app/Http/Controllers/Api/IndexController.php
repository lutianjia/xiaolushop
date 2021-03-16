<?php


namespace App\Http\Controllers\Api;


use App\Entity\Brand;
use App\Entity\Orders;
use App\Entity\Pay;
use App\Entity\Product_category;
use App\Entity\Products;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //获取头部分类
    public function getCategory(){
        $product_category = new Product_category();
        $category = $product_category->getCategory(1);
        return $category;
    }

    //获取首页分页树
    public function getListTree(){
        $product_category = new Product_category();
        $tree = $product_category->getchildren();
        return $tree;
    }

    //获取手机数码、服装、家电类下的类别
    public function getThreeCategory(){
        $product_category = new Product_category();
        $phoneID = $product_category->getDownParentName('手机数码');
        $computerID = $product_category->getDownParentName('女装家居');
        $applianceID = $product_category->getDownParentName('生活电器');
        $phoneCategory = $product_category->getCategory($phoneID[0]->id);
        $computerCategory = $product_category->getCategory($computerID[0]->id);
        $applianceCategory = $product_category->getCategory($applianceID[0]->id);
        $category['phoneCategory'] = $phoneCategory;
        $category['computerCategory'] = $computerCategory;
        $category['applianceCategory'] = $applianceCategory;
        return $category;
    }

    //获取手机数码、服装、家电类的品牌
    public function getThreeBrand(){
        $category = $this->getThreeCategory();
        $brand = new Brand();
        $product = $this->getProduct($category['phoneCategory'],$category['computerCategory'],$category['applianceCategory']);

        for($i = 0; $i<count($product['phoneproducts']); $i++){
            $brandId['phoneproducts'][] = $product['phoneproducts'][$i]->brand;
        }
        for($i = 0; $i<count($product['computerproducts']); $i++){
            $brandId['computerproducts'][] = $product['computerproducts'][$i]->brand;
        }
        for($i = 0; $i<count($product['applianceproducts']); $i++){
            $brandId['applianceproducts'][] = $product['applianceproducts'][$i]->brand;
        }
        $phoneBrand = $brand->getBrandMessage($brandId['phoneproducts']);
        $computerBrand = $brand->getBrandMessage($brandId['computerproducts']);
        $applianceBrand = $brand->getBrandMessage($brandId['applianceproducts']);
        $brandList['phoneBrand'] = $phoneBrand;
        $brandList['computerBrand'] = $computerBrand;
        $brandList['applianceBrand'] = $applianceBrand;
        return $brandList;
    }

    //获取手机数码、服装、家电类的数据
    public function getThreeProduct(){
        $category = $this->getThreeCategory();
        $products = $this->getAllProduct($category['phoneCategory'],$category['computerCategory'],$category['applianceCategory']);
        return $products;
    }

    //得到所有商品
    public function getProduct($phoneCategory,$computerCategory,$applianceCategory){
        $phoneId = $this->getArrayId($phoneCategory);
        $computerCategoryId = $this->getArrayId($computerCategory);
        $applianceCategoryId = $this->getArrayId($applianceCategory);
        $product = new Products();
        $phoneproducts = $product->getAllCategory($phoneId);
        $computerproducts = $product->getAllCategory($computerCategoryId);
        $applianceproducts = $product->getAllCategory($applianceCategoryId);
        $products['phoneproducts'] = $phoneproducts;
        $products['computerproducts'] = $computerproducts;
        $products['applianceproducts'] = $applianceproducts;
        return $products;
    }

    //得到每个分类下的所有商品
    public function getAllProduct($phoneCategory,$computerCategory,$applianceCategory){
        $products = $this->getProduct($phoneCategory,$computerCategory,$applianceCategory);
        $products['phoneproducts'] = $this->fenUpDown($products['phoneproducts']);
        $products['computerproducts'] = $this->fenUpDown1($products['computerproducts']);
        $products['applianceproducts'] = $this->fenUpDown2($products['applianceproducts']);
        return $products;
    }

    public function fenUpDown($data){
        for($i=0;$i<count($data);$i++){
            if($i<2){
                $products['phoneproducts']['1'][] = $data[$i];
            }elseif($i<4){
                $products['phoneproducts']['2'][] = $data[$i];
            }else{
                $products['phoneproducts']['3'][] = $data[$i];
            }
        }
        return $products;
    }
    public function fenUpDown1($data){
        for($i=0;$i<count($data);$i++){
            if($i<2){
                $products['computerproducts']['1'][] = $data[$i];
            }elseif($i<4){
                $products['computerproducts']['2'][] = $data[$i];
            }else{
                $products['computerproducts']['3'][] = $data[$i];
            }
        }
        return $products;
    }
    public function fenUpDown2($data){
        for($i=0;$i<count($data);$i++){
            if($i<2){
                $products['applianceproducts']['1'][] = $data[$i];
            }elseif($i<4){
                $products['applianceproducts']['2'][] = $data[$i];
            }else{
                $products['applianceproducts']['3'][] = $data[$i];
            }
        }
        return $products;
    }
    //得到数组中的id
    public function getArrayId($array){
        $arrayId = [];
        foreach ($array as $k=>$v){
            array_push($arrayId,$v->id);
        }
        return $arrayId;
    }

    //获取最畅销的各类商品
    public function getSellingProducts(){
        $category = $this->getThreeCategory();
        $phoneId = $this->getArrayId($category['phoneCategory']);
        $computerCategoryId = $this->getArrayId($category['computerCategory']);
        $applianceCategoryId = $this->getArrayId($category['applianceCategory']);
        $products = new Products();
        $sellPhoneProducts = $products->getSellingProducts($phoneId);
        $sellcomputerProducts = $products->getSellingProducts($computerCategoryId);
        $sellapplianceProducts = $products->getSellingProducts($applianceCategoryId);
        $sellProducts['sellPhoneProducts'] = $sellPhoneProducts;
        $sellProducts['sellcomputerProducts'] = $sellcomputerProducts;
        $sellProducts['sellapplianceProducts'] = $sellapplianceProducts;
        return $sellProducts;
    }

    //获得历史订单信息
    public function getOrderMessage($userId){
        if($userId == ''){
            $productMessage = '';
            return $productMessage;
        }
        $pay = new Pay();
        $order = new Orders();
        $product = new Products();
        $payMessage = $pay->getOrderMessageByUserId($userId);
        for($i=0;$i<count($payMessage);$i++){
            $orders[$i] = $this->strsToArray($payMessage[$i]->orderId);
        }
        if($payMessage == null){
            return null;
        }
        $orders = array_reduce($orders, function ($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        for($i=0;$i<count($orders);$i++){
            $orderMessage = $order->getOrderMessageByOrderId($orders[$i]);
            $productId[$i] = $orderMessage[0]->product_id;
        }
        $productId = array_unique($productId);
        $productId = array_merge($productId);
        for($i=0;$i<count($productId);$i++){
            $productMessage[$i] = $product->getOneProductMessage($productId[$i]);
        }
        return $productMessage;
    }

    function strsToArray($strs) {
        $result = array();
        $array = array();
        $strs = str_replace('，', ',', $strs);
        $strs = str_replace("n", ',', $strs);
        $strs = str_replace("rn", ',', $strs);
        $strs = str_replace(' ', ',', $strs);
        $array = explode(',', $strs);
        foreach ($array as $key => $value) {
            if ('' != ($value = trim($value))) {
                $result[] = $value;
            }
        }
        return $result;
    }
}