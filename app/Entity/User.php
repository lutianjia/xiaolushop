<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $guarded = ['id','created_at', 'updated_at'];

    //判断邮箱是否被注册过
    public function checkRegister($email){
        $result = User::where("email",$email)->count();
        return $result;
    }

    //找到密码
    public function getPasswordByAccount($nameNick){
        $result = User::where("nameNick",$nameNick)->select('password','id','nameNick','token','qqPro')->get();
        $result = json_decode($result);
        return $result[0];
    }

    //找到密码
    public function getPasswordByEmail($email){
        $result = User::where("email",$email)->select('password','id','nameNick','token','qqPro')->get();
        $result = json_decode($result);
        return $result[0];
    }

    //通过邮箱查看用户所有信息
    public function getMessageByEmail($email){
        $result = User::where("email",$email)->get();
        $result = json_decode($result);
        return $result;
    }

    //通过id查看用户所有信息
    public function getMessageById($id){
        $result = User::where("id",$id)->get();
        $result = json_decode($result);
        return $result;
    }
    //通过id查看用户的钱
    public function getPriceById($id){
        $result = User::where("id",$id)->select('money')->get();
        $result = json_decode($result);
        return $result;
    }

    //通过token查看用户的钱
    public function getPriceByToken($id){
        $result = User::where("token",$id)->select('money')->get();
        $result = json_decode($result);
        return $result;
    }

    //增加或扣钱
    public function changeMoney($id,$money){
        $result = User::where("id",$id)->increment('money', $money);
        return $result;
    }

    //通过账号查看用户所有信息
    public function getMessageByAccount($account){
        $result = User::where("nameNick",$account)->get();
        $result = json_decode($result);
        return $result;
    }

    //验证code码
    public function checkCode($code,$id){
        $result = $this->getMessageById($id);
        $email = $result[0]->email;
        $redis = new Redis();
        $rCode = $redis->redisGet($email);
        if($rCode != $code){
            return false;
        }else{
            return $email;
        }
    }

    //判断qq号是否绑定
    public function checkToken($token){
        $result = User::where("token",$token)->get();
        if(count($result) < 1){
            return 0;
        }else{
            return 1;
        }
    }

    //通过token查询用户信息
    public function getMessageByToken($token){
        $result = User::where("token",$token)->get();
        $result = json_decode($result);
        return $result;
    }

    //判断是否提示qq绑定
    public function checkQqBind($id){
        $result = User::where("id",$id)->select('qqPro')->get();
        $result = json_decode($result);
        if(count($result) < 1){
            return false;
        }else{
            if($result[0]->qqPro == 1){
                return true;
            }else{
                return false;
            }
        }
    }
}