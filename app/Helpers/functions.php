<?php

use App\Entity\Product_category;

//取出产品类型列表数据
function productTypeList(){
    $result = Product_category::where('status','<>','-1')->select('id','pId','name')->get();
    $result = json_decode($result,true);
    $result[0]["open"] = true;
    $result = json_encode($result);
    return $result;
}

//取出下架的产品类型列表数据
function productDownTypeList(){
    $result = Product_category::where('status','=','0')->select('name')->get();
    $result = json_encode($result);
    return $result;
}

//获取所有pId为1的分类
function getAllFirstCategory(){
    $result = Product_category::where("status", "<>", "-1")->where("pID", "=", "1")->select("name","id")->get();
    $result = json_decode($result);
    return $result;
}


