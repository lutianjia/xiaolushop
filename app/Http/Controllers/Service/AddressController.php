<?php


namespace App\Http\Controllers\Service;


use App\Http\Controllers\Controller;
use App\Models\M3Result;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function addressAdd(Request $request){
        $address_id = $request->input('id','');
        $phone = $request->input('phone','');
        $recipient = $request->input('recipient','');
        $country = $request->input('country','');
        $city = $request->input('city','');
        $detail_address = $request->input('detail_address','');
        $id = $request->session()->get('retailer.id');
        $address = new \App\Http\Controllers\Api\AddressController();
        $m3_result = new M3Result();
        if($address_id == ''){
            $result = $address->addressAdd($id,$phone,$recipient,$country,$city,$detail_address);
            if($result){
                $m3_result->status = 0;
                $m3_result->message = '提交成功！';
            }
        }else{
            $result = $address->changeAddress($address_id,$phone,$recipient,$country,$city,$detail_address);
            if($result){
                $m3_result->status = 0;
                $m3_result->message = '修改成功！';

            }
        }
        return $m3_result->toJson();
    }
}