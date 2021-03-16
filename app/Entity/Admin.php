<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    //查看历史密码是否正确
    public function checkPassword($id,$password){
        $password = md5($password.config('solt.password_pre_halt'));
        $result = Admin::where('id', $id)->where('password', $password)->count();
        if($result == 1){
            return true;
        }else{
            return false;
        }
    }

    //修改信息
    public function changeMessage($id,$password='',$from='',$data=''){
        if($from == ''){
            $password = md5($password.config('solt.password_pre_halt'));
            $data['password'] = $password;
            $result = Admin::where('id', $id)->update($data);
            return $result;
        }else{
            $result = Admin::where('id', $id)->update($data);
            return $result;
        }
    }

    //获取用户信息
    public function getAdminMessage($id){
        $result = Admin::where('id', $id)->get();
        json_decode($result);
        return $result;
    }

    //获取用户历史登录信息
    public function getAdminHistoryMessage($id){
        $result = History_login::where('admin_id', $id)->get();
        json_decode($result);
        return $result;
    }
}