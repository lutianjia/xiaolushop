<?php


namespace App\Http\Controllers\Service;


use App\Http\Controllers\View\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangeStatusController extends Controller
{
    public function changeStatus(Request $request){
        $id = $request->input("id");
        $table = $request->input("table");
        $status = $request->input("status");
        $pId = $request->input("pId","");
        $batchDelete = $request->input("from","");
//        var_dump($pId);exit;
        $m3_result = new M3Result();
        if($batchDelete){
            foreach($id as $v) {
                DB::table($table)->where("id", "=", "$v")->update(['status' => -1]);
            }
            $m3_result->status = 0;
            $m3_result->id = $id;
            return $m3_result->toJson();
        }
        $data['status'] = $status;
        $result = DB::table($table)->where('id',$id)->update($data);
        $m3_result = new M3Result();
        if($pId != ''){
            $count = DB::table($table)->where('pId',$pId)->where('status','<>','-1')->count();
            $m3_result->pId = $count;
        }
//        var_dump($count);exit;

        if($result){
            $m3_result->status = 0;
            $m3_result->id = $id;
            return $m3_result->toJson();
        }else{
            $m3_result->status = 1;
            return $m3_result->toJson();
        }
    }
}