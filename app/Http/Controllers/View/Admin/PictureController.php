<?php


namespace App\Http\Controllers\view\Admin;


use App\Entity\ImageCategory;
use App\Entity\Images;
use App\Http\Controllers\View\Controller;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function advertising(Request $request){
        $imageCategory = new ImageCategory();
        $images = new Images();
        $category_id = $request->route('category_id','');
        $imageCategoryList = $imageCategory->getAllCategory();
        $imageList = $images->getImage($category_id);
        return view("admin/advertising")->with([
            'imageCategoryList' => $imageCategoryList,
            'imageList' => $imageList,
        ]);
    }
    public function sortAds(){
        $imageCategory = new ImageCategory();
        $result = $imageCategory->getAllCategory();
        return view("admin/Sort_ads")->with([
            'category_list' => $result,
        ]);
    }
    public function adsList(){
        return view("admin/Ads_list");
    }
}