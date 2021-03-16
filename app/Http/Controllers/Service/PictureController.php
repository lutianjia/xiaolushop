<?php


namespace App\Http\Controllers\Service;


use App\Entity\ImageCategory;
use App\Entity\Images;
use App\Http\Controllers\View\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function addPictureCategory(Request $request){
        $image_category_name = $request->input('image_category_name','');
        $remarks = $request->input('remarks','');
        $status = $request->input('status','');
        $id = $request->input('id','');
        $m3_result = new M3Result();
        if($id == ''){
            $message = $this->getAdminMessage();
            $id = $message->id;
            $data['image_category_name'] = $image_category_name;
            if($remarks != ''){
                $data['remarks'] = $remarks;
            }

            $data['status'] = $status;
            $data['enterUserId'] = $id;
            $result = ImageCategory::create($data);

            if($result){
                $m3_result->status = 0;
                $m3_result->message = '提交成功';
                return $m3_result->toJson();
            }else{
                $m3_result->status = 1;
                $m3_result->message = '提交失败';
                return $m3_result->toJson();
            }
        }else{
            $data['image_category_name'] = $image_category_name;
            if($remarks != ''){
                $data['remarks'] = $remarks;
            }
            $data['status'] = $status;
            $imageCategory = ImageCategory::find($id);
            $imageCategory->image_category_name = $data['image_category_name'];
            $imageCategory->remarks = $data['remarks'];
            $imageCategory->status = $data['status'];
            $imageCategory->save();
            $m3_result->status = 0;
            $m3_result->message = '修改成功';
            return $m3_result->toJson();
        }
    }

    public function imageAdd(Request $request){
        $category_id = $request->input('category');
        $size1 = $request->input('size1','');
        $size2 = $request->input('size2','');
        $size = $size1.'x'.$size2;
        $sort = $request->input('sort','');
        $url = $request->input('url','');
        $image = $request->input('image','');
        $id = $request->input('id','');
        $m3_result = new M3Result();
        $data['category_id'] = $category_id;
        $data['size'] = $size;
        $data['sort'] = $sort;
        $data['url'] = $url;
        $data['image'] = $image;
        $data['status'] = 1;
        if($id != ''){
            $imageCategory = Images::find($id);
            $imageCategory->category_id = $data['category_id'];
            $imageCategory->size = $data['size'];
            $imageCategory->sort = $data['sort'];
            $imageCategory->url = $data['url'];
            $imageCategory->image = $data['image'];
            $imageCategory->save();
            $m3_result->status = 0;
            $m3_result->message = '修改成功';
            return $m3_result->toJson();
        }

        Images::create($data);
        $m3_result->status = 0;
        $m3_result->message = '提交成功';
        return $m3_result->toJson();
    }

    public function changeSort(Request $request){
        $sort = $request->input('sort','');
        $id = $request->input('id','');
        $images = new Images();
        $images->changeSort($id,$sort);
    }
}