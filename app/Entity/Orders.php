<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = ['id','created_at', 'updated_at'];

    //通过id获取单个订单的信息
    public function getOneOrderMessage($id){
        $result = Orders::where("id",$id)->get();
        $result = json_decode($result);
        return $result;
    }
    //通过id修改订单的状态
    public function updateOrderStatus($id){
        $data['status'] = 1;
        $result = Orders::where("orderId",$id)->update($data);
        $result = json_decode($result);
        return $result;
    }
    //通过用户id获取未结算订单的信息
    public function getOrderMessage($id){
        $time = time()-3600*24;
        $result = Orders::where("userId",$id)->where("create_time",">",$time)->where("status","<>","1")->get();
        $result = json_decode($result);
        return $result;
    }
    //通过用户id获取以结算订单的信息
    public function getOrderMessageById($id){
        $time = time()-3600*24;
        $result = Orders::where("userId",$id)
            ->where(function($query) use($time) {
                $query->orWhere("create_time",">",$time)->orWhere("status",'=',1);
            })->orderBy('create_time','desc')->get();
        $result = json_decode($result);
        return $result;
    }
    //通过订单id获取以结算订单的信息
    public function getOrderMessageByOrderId($id){
        $result = Orders::where('orderId','=',$id)->get();
        $result = json_decode($result);
        return $result;
    }

    //查看该商品是否已经提交为订单
    public function getIsOrder($userId,$productId){
        $time = time()-3600*24;
        $result = Orders::where("userId",$userId)->where("product_id",$productId)->where("create_time",">",$time)->where("status","<>","1")->select("id")->get();
        $result = json_decode($result);
        return $result;
    }

    //获取订单数量
    public function getOrderCount(){
        $result = Orders::count();
        return $result;
    }

    //获取交易失败数量
    public function getOrderFailCount(){
        $time = time()-3600*24;
        $result = Orders::where("create_time","<",$time)->where('status','=',0)->count();
        $result = json_decode($result);
        return $result;
    }

    //获取每月的订单量
    public function getOrderCountByMonth(){
        $n = date('m')-1;
        $m = date('m')-2;
        for($i=1;$i<=date('m');$i++){
            $beginThismonth[$i]=mktime(0,0,0,date('m')-$n,1,date('Y'));
            $endThismonth[$i]=mktime(23,59,59,date('m')-$m,0,date('Y'));
            $allResult[] = Orders::where("create_time",">=",$beginThismonth[$i])->where('create_time','<',$endThismonth[$i])->count();
            $payResult[] = Orders::where("create_time",">=",$beginThismonth[$i])->where('create_time','<',$endThismonth[$i])->where('status','=',1)->count();
            $n--;
            $m--;
        }
        $result['allResult'] = $allResult;
        $result['payResult'] = $payResult;
        $result = json_encode($result);
        return $result;
    }
}