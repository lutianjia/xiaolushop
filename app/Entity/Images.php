<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Images extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = ['id','created_at', 'updated_at'];

    //获取广告
    public function getImage($category=''){
        if($category == ''){
            $result = DB::table('images')
                ->join('image_category', 'images.category_id', '=', 'image_category.id')
                ->where('images.status','!=',-1)
                ->select('images.*', 'image_category.image_category_name')
                ->get();
        }else{
            $result = DB::table('images')
                ->join('image_category', 'images.category_id', '=', 'image_category.id')
                ->where('images.status','!=',-1)
                ->where('category_id','=',$category)
                ->select('images.*', 'image_category.image_category_name')
                ->get();
        }

        $result = json_decode($result);
        return $result;
    }

    //修改排列顺序
    public function changeSort($id,$sort){
        $data['sort'] = $sort;
        $result = Images::where('id','=',$id)->update($data);
        return $result;
    }

    //按分类获取所有广告
    public function getAddImagesByCategory(){
        $imageCategory = ImageCategory::where('status','=',1)->select('id')->get();
        $imageCategory = json_decode($imageCategory);
        for($i=0;$i<count($imageCategory);$i++){
            $result[$i] = Images::where('status','=',1)->where('category_id','=',$imageCategory[$i]->id)->select('url','image')->orderBy('sort')->get();
            $result[$i] = json_decode($result[$i]);
        }
        return $result;
    }
}