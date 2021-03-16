<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = ['id','created_at', 'updated_at'];

    //搜索用户的地址
    public function getAddressList($userId){
        $result = Address::where("userId",$userId)->where("status" ,"=","1")->get();
        $result = json_decode($result);
        return $result;
    }
    //通过id搜索用户的地址
    public function getAddressById($id){
        $result = Address::where("id",$id)->get();
        $result = json_decode($result);
        return $result;
    }

    //查询地址信息
    public function getAddressMessage($id){
        $result = Address::where("id",$id)->where("status" ,"=","1")->get();
        $result = json_decode($result);
        return $result;
    }
    //查询地址信息
    public function changeAddressMessage($id,$data){
        $result = Address::where("id",$id)->update($data);
        return $result;
    }
}