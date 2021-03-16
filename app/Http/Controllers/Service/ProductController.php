<?php


namespace App\Http\Controllers\Service;


use App\Entity\Product_category;
use App\Entity\Products;
use App\Models\M3Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends \App\Http\Controllers\View\Controller
{
    public function product_category_add(Request $request){
        $parent_id = $request->input("parent_id");
        $product_category = new Product_category();
        $status = $product_category->getStatus($parent_id);
        $status = json_decode($status);
        $status = $status[0]->status;
        $m3_result = new M3Result();
        if($status == 0){
            $m3_result->status = 3;
            $m3_result->message = '该类别已下架';
            return $m3_result->toJson();
        }

        $product_category_name = $request->input("product_category_name");
        $remarks = $request->input("remarks");
        $message = $this->getAdminMessage();
        $data['name'] = $product_category_name;
        $data['pId'] = $parent_id;
        if(!empty($remarks)){
            $data['remarks'] = $remarks;
        }

        $data['create_user_name'] = $message->username;
        $data['create_time'] = time();
        $result = DB::table('product_category')->insert($data);

        if($result){
           $m3_result->status = 0;
           $m3_result->message = '添加成功';
           return $m3_result->toJson();
        }else{
            $m3_result->status = 1;
            $m3_result->message = '服务器端错误';
            return $m3_result->toJson();
        }
    }

    public function product_add(Request $request){
        $data = $request->input();
        $m3_result = new M3Result();
        unset($data['_token']);

        if($data['id'] == ''){
            unset($data['id']);
        }else{
            if($data['image'] == ''){
                unset($data['image']);
            }
            $picture = new Products();
            $result = $picture->updateOneProductMessage($data['id'],$data);
            if($result){
                $m3_result->status = 0;
                $m3_result->message = '修改成功';
                return $m3_result->toJson();
            }
        }
        $data['image'] = substr($data['image'],0,-1);
        var_dump($data);
        Products::create($data);

        $m3_result->status = 0;
        $m3_result->message = '保存成功';
        return $m3_result->toJson();
    }
}