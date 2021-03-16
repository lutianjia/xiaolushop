<?php


namespace App\Http\Controllers\Api;


use App\Entity\Brand;
use App\Entity\Product_category;
use App\Entity\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use JakubOnderka\PhpConsoleColor\ConsoleColor;

class ShopController extends Controller
{
    //获取所有品牌
    public function getAllBrand(){
        $result = Brand::where("status","=","1")->get();
        $result = json_decode($result);
        return $result;
    }

    //获取产品展示页面的商品
    public function getShopProducts($brand_id,$category_id,$low_price,$height_price,$pageCount,$orderBy,$type,$page=1,$from='0'){
        if($from == 'index'){
            $result = Products::where("category_id","=",$category_id)->paginate($pageCount);
            return $result;
        }
        $data['status'] = 1;
        if($brand_id != 0){
            $data['brand'] = $brand_id;
        }
        if($orderBy != 0){
            if($orderBy == 1){
                $By = 'viewCount';
            }elseif ($orderBy == 2){
                $By = 'create_time';
            }elseif ($orderBy == 3) {
                $By = 'current_price';
            }
        }
//        DB::connection()->enableQueryLog();
        if($category_id != 0){
            $brandId = Product_category::where("pId","=","$category_id")->where("status","=","1")->select("id")->get();
            $brandId = json_decode($brandId);
            for($i=0;$i<count($brandId);$i++){
                $brandId[$i] = $brandId[$i]->id;
            }

            if($height_price == 0) {
                if($type == 'up'){
                    if($orderBy != 0) {
                        $result = Products::where($data)->whereIn("category_id", $brandId)->orderByDesc($By)->paginate($pageCount);
                    }else{
                        $result = Products::where($data)->whereIn("category_id", $brandId)->paginate($pageCount);
                    }
                }else{
                    if($orderBy != 0) {
                        $result = Products::where($data)->whereIn("category_id", $brandId)->orderBy($By)->paginate($pageCount);
                    }else{
                        $result = Products::where($data)->whereIn("category_id", $brandId)->paginate($pageCount);
                    }
                }

            }else{
                $brandId=implode(',', $brandId);
                if($brand_id != 0) {
                    if($orderBy != 0) {
                        $result = DB::select('select id from (select * from  products where (`category_id` in (' . $brandId . ')) and (brand = ' . $brand_id . ') order by '.$By.'  LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price > ' . $height_price . ')');
                    }else{
                        $result = DB::select('select id from (select * from  products where (`category_id` in (' . $brandId . ')) and (brand = ' . $brand_id . ') LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price > ' . $height_price . ')');
                    }
                }else{
                    if($orderBy != 0){
                        $result = DB::select('select id from (select * from  products where (`category_id` in (' . $brandId . ')) order by '.$By.'   LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price > ' . $height_price . ')');
                    }else{
                        $result = DB::select('select id from (select * from  products where (`category_id` in (' . $brandId . ')) LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price > ' . $height_price . ')');
                    }
                }
                //                $result = Products::where($data)->whereIn("category_id",$brandId)->where(function ($query)use ($low_price,$height_price) {
//                    $query->orWhere("current_price","<","$low_price")->orWhere("current_price",">","$height_price");})->select("id")->paginate($pageCount);
            }
        }else{
            if($height_price == 0) {
                if($type == 'up'){
                    if($orderBy != 0){
                        $result = Products::where($data)->orderByDesc($By)->paginate($pageCount);
                    }else{
                        $result = Products::where($data)->paginate($pageCount);
                    }
                }else{
                    if($orderBy != 0){
                        $result = Products::where($data)->orderBy($By)->paginate($pageCount);
                    }else{
                        $result = Products::where($data)->paginate($pageCount);
                    }
                }

            }else{
                if($brand_id != 0) {
                    if($orderBy != 0){
                        $result = DB::select('select id from (SELECT * FROM products where brand = ' . $brand_id . ' order by '.$By.' LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price >' . $height_price . ') ');
                    }else{
                        $result = DB::select('select id from (SELECT * FROM products where brand = ' . $brand_id . ' LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price >' . $height_price . ') ');
                    }
                }else{
                    if($orderBy != 0){
                        $result = DB::select('select id from (SELECT * FROM products order by '.$By.' LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price >' . $height_price . ') ');
                    }else{
                        $result = DB::select('select id from (SELECT * FROM products LIMIT ' . ($page - 1) * $pageCount . ',' . $page * $pageCount . ') p where (p.status = 1)  and (p.current_price < ' . $low_price . ' or p.current_price >' . $height_price . ') ');
                    }
                }
//                DB::enableQueryLog();
//                $result = Products::where($data)->where(function ($query)use ($low_price,$height_price) {
//                    $query->orWhere("current_price","<","$low_price")->orWhere("current_price",">","$height_price");})->select("id")->paginate($pageCount);
            }
        }
//        $sql=DB::getQueryLog();
//
//        dump($sql);
//        $a = json_decode($result);
//        var_dump($a);
        return $result;
    }

    //产品页的最畅销
    public function getPublicProducts($brand_id,$category_id){
        if($category_id != 0){

            $brandId = Product_category::where("pId","=","$category_id")->where("status","=","1")->select("id")->get();
            $brandId = json_decode($brandId);
            for($i=0;$i<count($brandId);$i++){
                $brandId[$i] = $brandId[$i]->id;
            }

            if($brand_id != 0){
                $result = Products::where("status","=","1")->where("brand","=","$brand_id")->whereIn("category_id",$brandId)->orderByDesc("purchasesCount")->take(6)->get();
            }else{
                $result = Products::whereIn("category_id",$brandId)->where("status","=","1")->orderByDesc("purchasesCount")->take(6)->get();
            }
        }else{
            if($brand_id != 0){
                $result = Products::where("status","=","1")->where("brand","=","$brand_id")->orderByDesc("purchasesCount")->take(6)->get();
            }else{
                $result = Products::where("status","=","1")->orderByDesc("purchasesCount")->take(6)->get();
            }
        }

        $result = json_decode($result);
        return $result;
    }
}