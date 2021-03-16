<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table = 'pay';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $guarded = ['id','created_at', 'updated_at'];

    //通过订单id获取以结算订单的信息
    public function getOrderMessageByOrderId($id){
        $result = Pay::where('orderId','like','%'.$id.'%')->get();
        $result = json_decode($result);
        return $result;
    }
    //通过用户id获取以结算订单的信息
    public function getOrderMessageByUserId($id){
        $result = Pay::where('userId','=',$id)->get();
        $result = json_decode($result);
        return $result;
    }

    //获取付款的总价
    public function getTotalPrice(){
        $result = Pay::select('money')->get();
        $result = json_decode($result);
        $totalPrice = 0;
        for($i=0;$i<count($result);$i++){
            $totalPrice = $totalPrice+ $result[$i]->money;
        }
        return $totalPrice;
    }

    //获取交易总量
    public function getPayCount(){
        $result = Pay::count();
        return $result;
    }
}