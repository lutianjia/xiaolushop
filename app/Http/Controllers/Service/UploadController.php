<?php


namespace App\Http\Controllers\Service;


use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        //判断请求中是否包含name=img的上传文件
        $m3_result = new M3Result();

        // 判断图片上传中是否出错
        $addBrandFile = $request->file('Filedata','');
        $addProductFile = $request->file('file','');
        if($addBrandFile){
            if (!$addBrandFile->isValid()) {
                exit("上传图片出错，请重试，<a href=''>返回上一页！</a>");
            }
            //$img_path = $file -> getRealPath(); // 获取临时图片绝对路径
            $entension = $addBrandFile -> getClientOriginalExtension(); //  上传文件后缀
            $filename = date('YmdHis').mt_rand(100,999).'.'.$entension;  // 重命名图片
            $date = date('Ymd');
            $path = $addBrandFile->move(public_path().'/uploads/brandImg/'.$date.'/',$filename);  // 重命名保存
            $img_path = 'uploads/brandImg/'.$date.'/'.$filename;
            $m3_result->status = 0;
            $m3_result->message = '上传成功';
            $m3_result->url = $img_path;
            return $m3_result->toJson();
        }
        if($addProductFile){
            $entension = $addProductFile->extension();//  上传文件后缀
            $filename = date('YmdHis').mt_rand(100,999).'.'.$entension;  // 重命名图片
            $date = date('Ymd');
//            $path = $addBrandFile->move(public_path().'/uploads/productImg/'.$date.'/',$filename);  // 重命名保存
            $path = $addProductFile->move(public_path().'/uploads/productImg/'.$date.'/',$filename);
            $img_path = 'uploads/productImg/'.$date.'/'.$filename;
            $m3_result->status = 0;
            $m3_result->message = '上传成功';
            $m3_result->url = $img_path;
            return $m3_result->toJson();
        }
    }
}