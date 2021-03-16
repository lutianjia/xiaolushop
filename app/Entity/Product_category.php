<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $table = 'product_category';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    public function getDownParentName($parentName){
        $result = Product_category::where("name",'=',$parentName)->get();
        $downName = json_decode($result);
        return $downName;
    }

    public function getChindrenCount($parentId){
        $result = Product_category::where("pId","=",$parentId)->whereIn("status", ['0','1'])->select("name")->get();
        $result = count($result);
        $result = json_decode($result);
        return $result;
    }

    public function getDownName($parentId){
        $result = Product_category::where("pId","=",$parentId)->where("status", "=", "0")->select("name")->get();
        $result = json_decode($result);
        return $result;
    }
    public function getCategory($parentId){
        $result = Product_category::where("pId","=",$parentId)->where("status", "=", "1")->select("id","name")->get();
        $result = json_decode($result);
        return $result;
    }

    public function getStatus($parentId){
        $result = Product_category::where("id","=",$parentId)->select("status")->get();
        return $result;
    }



    //执行函数
    public function getchildren(){
        //取出所有分类
        $data=Product_category::where('status', '<>' , '-1')->get();
        //每次执行前将$extis设为true  函数就会清空$res
        $data = json_decode($data);
        $data = $this->objectToArray($data);
        $res= $this->getTree($data);
        return $res;
    }

    public function  objectToArray( $object ){
        $temp  =  is_object ( $object ) ? get_object_vars( $object ) :  $object ;
        $arr = array ();
        foreach  ( $temp  as  $k  =>  $v ) {
            $v  = ( is_array ( $v ) ||  is_object ( $v )) ? $this->objectToArray( $v ) :  $v ;
            $arr [ $k ] =  $v ;
        }
        return  $arr ;
    }

    public function getTree($categories){
        $tree = array();
//第一步，将分类id作为数组key,并创建children单元
        foreach($categories as $category){
            $tree[$category['id']] = $category;
            $tree[$category['id']]['children'] = array();
        }
//第二部，利用引用，将每个分类添加到父类children数组中，这样一次遍历即可形成树形结构。
        foreach ($tree as $k=>$item) {
            if ($item['pId'] != 0) {
                $tree[$item['pId']]['children'][] = &$tree[$k];
            }
        }
        return $tree;
    }



}