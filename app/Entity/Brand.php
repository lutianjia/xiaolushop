<?php


namespace App\Entity;


use DeepCopy\f001\B;
use Illuminate\Database\Eloquent\Model;
use test\Mockery\MockingVariadicArgumentsTest;

class Brand extends Model
{
    protected $table = 'brand';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $fillable=['brand_name','country','logo','remarks'];

    //根据条件获取品牌分页列表
    public function getBrandList($paginateCount,$condition = '',$time = ''){
        if($condition){
            if($condition['brand_name'] == ''){
                unset($condition['brand_name']);
            }
            if($condition['country'] == 2){
                unset($condition['country']);
                if(sizeof($condition) == '0'){
                    if($time != ''){
                        $result = Brand::where("status","!=", "-1")->where("country", "!=", "China")->where('create_time', 'like', "$time%")->paginate($paginateCount);
                    }else{
                        $result = Brand::where("status","!=", "-1")->where("country", "!=", "China")->paginate($paginateCount);
                    }
                }else{
                    if($time != ''){
                        $result = Brand::where("status","!=", "-1")->where($condition)->where("country", "!=", "China")->where('create_time', 'like', "$time%")->paginate($paginateCount);
                    }else{
                        $result = Brand::where("status","!=", "-1")->where($condition)->where("country", "!=", "China")->paginate($paginateCount);
                    }
                }
            }else{
                if($time != ''){
                    $result = Brand::where("status","!=", "-1")->where($condition)->where('create_time', 'like', "$time%")->paginate($paginateCount);
                }else{
                    $result = Brand::where("status","!=", "-1")->where($condition)->paginate($paginateCount);
                }
            }
        }else{
            if($time) {
                $result = Brand::where("status", "!=", "-1")->where('create_time', 'like', "$time%")->paginate($paginateCount);
            }else{
                $result = Brand::where("status", "!=", "-1")->paginate($paginateCount);
            }
        }
        return $result;
    }
    //获取品牌数量
    public function getBrandListCount($condition = ''){
        if($condition) {
            if($condition['brand_name'] == ''){
                unset($condition['brand_name']);
            }
            if($condition['country'] == 2){
                unset($condition['country']);
                if(sizeof($condition) == '0'){
                    $result = Brand::where("status", '!=', '-1')->where("country", "!=", "China")->count();
                }else{
                    $result = Brand::where("status", '!=', '-1')->where($condition)->where("country", "!=", "China")->count();
                }
            }else{
                $result = Brand::where("status", '!=', '-1')->where($condition)->count();
            }
        }else{
            $result = Brand::where("status", '!=', '-1')->count();
        }
        $result = json_decode($result);
        return $result;
    }

    //通过id获取单个品牌的信息
    public function getOneBrandMessage($id){
        $result = Brand::where("id",$id)->get();
        return $result;
    }

    //通过id获取单个品牌下的商品数量
    public function getOneBrandDownProductCount($id){
        $result = Products::where("brand",$id)->count();
        return $result;
    }

    //通过id获取单个品牌下的商品信息
    public function getOneBrandDownProductMessage($id){
        $result = Products::where("brand",$id)->where("status","<>", "-1")->get();
        $result = json_decode($result);
        return $result;
    }

    //通过品牌名称获取单个品牌的信息
    public function getOneBrandMessageByName($name){
        $result = Brand::where("brand_name",$name)->get();
        $result = json_decode($result);
        return $result;
    }

    //修改某个品牌信息
    public function updateOneBrandMessage($id,$brandData){
        $result = Brand::where("id", $id)->update($brandData);
        $result = json_decode($result);
        return $result;
    }

    //获得国内或国外品牌数量
    public function getBrandCountByCountryOrOverseas($way,$condition = ''){
        if($condition) {
            if ($way == 'China') {
                $result = Brand::where("Country", $way)->where('status', '<>', '-1')->where($condition)->count();
            } else {
                $result = Brand::where("Country", '!=', 'China')->where('status', '<>', '-1')->where($condition)->count();
            }
        }else{
            if ($way == 'China') {
                $result = Brand::where("Country", $way)->where('status', '<>', '-1')->count();
            } else {
                $result = Brand::where("Country", '!=', 'China')->where('status', '<>', '-1')->count();
            }
        }
        $result = json_decode($result);
        return $result;
    }

    //获取品牌id函数中的品牌信息
    public function getBrandMessage($data){
        $result = Brand::whereIn("id", $data)->where("status","<>","-1")->get();
        $result = json_decode($result);
        return $result;
    }
}