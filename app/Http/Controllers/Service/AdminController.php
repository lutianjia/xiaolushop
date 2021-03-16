<?php


namespace App\Http\Controllers\Service;


use App\Entity\Admin;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function changePassword(Request $request){
        $data = $request->input();
        $admin = new Admin();
        $result = $admin->checkPassword($data['id'],$data['hisPassword']);
        $m3_result = new M3Result();
        if($result){
            $result = $admin->changeMessage($data['id'],$data['password']);
            if($result){
                $m3_result->status = 0;
                $m3_result->message = '修改成功';
                return $m3_result->toJson();
            }
        }else{
            $m3_result->status = 1;
            $m3_result->message = '原密码错误';
            return $m3_result->toJson();
        }
    }

    public function changeMessage(Request $request){
        $data = $request->input();
        unset($data['_token']);
        $admin = new Admin();
        $result = $admin->changeMessage($data['id'],'1', 'changeMessage', $data);
        $m3_result = new M3Result();
        if($result){
            $m3_result->status = 0;
            $m3_result->message = '修改成功';
            return $m3_result->toJson();
        }else{
            $m3_result->status = 1;
            $m3_result->message = '修改失败';
            return $m3_result->toJson();
        }
    }
}