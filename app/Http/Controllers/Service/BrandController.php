<?php


namespace App\Http\Controllers\Service;


use App\Entity\Brand;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandAdd(Request $request){
        $data = $request->input();
        $brand = new Brand();
        $m3_result = new M3Result();
        if($data['id'] != ''){
            if($data['img'] == ''){
                unset($data['img']);
            }else{
                $brandData['logo'] = $data['img'];
            }
            if($data['remarks'] == ''){
                unset($data['remarks']);
            }else{
                $brandData['remarks'] = $data['remarks'];
            }
            $brandData['brand_name'] = $data['brand_name'];
            $result = $brand->updateOneBrandMessage($data['id'],$brandData);
            if($result){
                $m3_result->status = 0;
                $m3_result->message = '修改成功';
                return $m3_result->toJson();
            }
        }else{
            $result = $brand->getOneBrandMessageByName($data['brand_name']);
            if($result){
                $m3_result->status = 3;
                $m3_result->message = '该品牌已存在';
                return $m3_result->toJson();
            }
            unset($data['_token']);
            if($data['img'] == ''){
                unset($data["img"]);
            }else{
                $data['img'] = substr($data['img'],19);
                $data['logo'] = $data['img'];
                unset($data['img']);
            }
            if($data['remarks'] == ''){
                unset($data['remarks']);
            }
            Brand::create($data);
            $m3_result->status = 0;
            $m3_result->message = '保存成功';
            return $m3_result->toJson();
        }
    }
}