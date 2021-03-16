<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    protected $table = 'image_category';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $guarded = ['id','created_at', 'updated_at'];

    //取出所有分类
    public function getAllCategory(){
        $result = ImageCategory::where("status","<>", '-1')->get();
        $result = json_decode($result);
        for($i=0;$i<count($result);$i++){
            $count = Images::where('category_id','=',$result[$i]->id)->count();
            $result[$i]->count = $count;
        }
        return $result;
    }
}