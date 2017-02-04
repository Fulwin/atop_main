<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\BaseInfo;
use App\Models\Product;
use App\Models\Download;

class Category extends Model
{
    //
    public function getTitleUrl(){
        return str_replace(' ','__',$this->Cate_Title);
    }

    public function parent(){
        return self::Fetch($this->Cate_ParentID);
    }

    /**
     * 根据给定的父级目录ID 加载子目录的静态方法
     *
     * @param $id
     * @param string $lang
     * @return mixed
     */
    public static function LoadCategoriesByParentId($id,$lang='EN') {
        return self::where('Cate_Lang',$lang)
            ->where('Cate_ParentId',$id)
//            ->where('Cate_State',1)
            ->select('Cate_Id','Cate_Title')
            ->orderBy('Cate_Order','ASC')
            ->get();
    }

    public static function Fetch($id){
        return self::where('Cate_Id',$id)->first();
    }

    public static function FetchByTitle($title,$lang='EN'){
        return self::where('Cate_Title',$title)->where('Cate_Lang',$lang)->first();
    }

    public function news($limit = null){
        if($limit)
            return News::where('News_CateId',$this->Cate_Id)->orderBy('News_Order','Desc')->take($limit)->get();
        else
            return News::where('News_CateId',$this->Cate_Id)->orderBy('News_Order','Desc')->get();
    }

    public function baseInfos(){
        return BaseInfo::where('BaseInfo_CateId',$this->Cate_Id)->orderBy('BaseInfo_Order','Desc')->get();
    }

    public function products(){
        return Product::where('Products_CateId',$this->Cate_Id)->orderBy('Products_Order','Desc')->get();
    }

    public function downloads(){
        return Download::where('Down_CateId',$this->Cate_Id)->orderBy('Down_Order','Desc')->get();
    }
}