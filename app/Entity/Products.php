<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $guarded = ['id', 'status','created_at', 'updated_at'];

    //通过id获取单个商品的信息
    public function getOneProductMessage($id){
        $result = Products::where("id",$id)->get();
        $result = json_decode($result);
        return $result;
    }
    //通过id获取单个商品的价格
    public function getOneProductPrice($id){
        $result = Products::where("id",$id)->select('current_price')->get();
        $result = json_decode($result);
        return $result;
    }

    //修改某个品牌信息
    public function updateOneProductMessage($id,$brandData){
        $result = Products::where("id", $id)->update($brandData);
        $result = json_decode($result);
        return $result;
    }

    //获取某类型商品列表信息
    public function getProductMessageByCategory($category_id=''){
        if($category_id == ''){
            $result = Products::where("status", "<>", "-1")->get();
        }else{
            $result = Products::where("category_id", $category_id)->where("status", "<>", "-1")->get();
        }
        $result = json_decode($result);
        return $result;
    }

    //根据条件获取商品信息列表
    public function getProductMessageByCondition($condition){
        if($condition['product_name'] != ''){
            if($condition['time'] != '') {
                $time = $condition['time'];
                $product_name = $condition['product_name'];
                $result = Products::where("status", "<>", "-1")->where('product_name', 'like', "%$product_name%")->where('create_time', 'like', "$time%")->get();
            }else{
                $product_name = $condition['product_name'];
                $result = Products::where("status", "<>", "-1")->where('product_name', 'like', "%$product_name%")->get();
            }
        }else{
            $time = $condition['time'];
            $result = Products::where("status", "<>", "-1")->where('create_time', 'like', "$time%")->get();
        }
        $result = json_decode($result);
        return $result;
    }

    //获取分类下的所有商品
    public function getAllCategory($id){
        $result = Products::whereIn("category_id", $id)->where("status",'=',"1")->take(6)->get();
        $result = json_decode($result);
        return $result;
    }

    //获取分类下最畅销的商品
    public function getSellingProducts($data){
        $result = Products::whereIn("category_id", $data)->where("status",'=',"1")->take(4)->orderByDesc("purchasesCount")->get();
        $result = json_decode($result);
        return $result;
    }

    //浏览量加一
    public function changeViewCount($account,$id){
        $redis = new Redis();
        $v = $redis->redisGet($account.$id);
        if(!$v || $v != $id){
            Products::where('id',$id)->increment("viewCount");
            $redis->redis($account.$id,$id,300);
        }

    }
}