<?php


namespace App\Http\Controllers\Api;


use App\Entity\Address;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //添加地址
    public function addressAdd($userId,$phone,$recipient,$country,$city,$detail_address){
        $data['userId'] = $userId;
        $data['phone'] = $phone;
        $data['recipient'] = $recipient;
        $data['country'] = $country;
        $data['city'] = $city;
        $data['detail_address'] = $detail_address;
        $data['status'] = 1;
        $result = Address::create($data);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //修改地址
    public function changeAddress($id,$phone,$recipient,$country,$city,$detail_address){
        $data['recipient'] = $recipient;
        $data['phone'] = $phone;
        $data['country'] = $country;
        $data['city'] = $city;
        $data['detail_address'] = $detail_address;
        $address = new Address();
        $result = $address->changeAddressMessage($id,$data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}