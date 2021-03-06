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
        $tmpArr = ['Data Center', 'Broadband Access'];
        $lang = $_SERVER['SERVER_NAME']=='www.atoptechnology.com.cn' ? 'CN' : 'EN';
        if( $lang == 'EN' ){
            if( !strpos($this->Cate_Title, '/') ){
                if( in_array($this->Cate_Title, $tmpArr) ){
                    return str_replace(' ','-',$this->Cate_Title);
                }else{
                    return str_replace(' ','__',$this->Cate_Title);
                }
            }else{
                return str_replace('/','-',$this->Cate_Title);
            }
        }else{
            if( strpos($this->Cate_Title, '/') ){
                return str_replace('/','-',$this->Cate_Title);
            }
            return str_replace(' ','__',$this->Cate_Title);
        }
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
    public static function LoadCategoriesByParentId($id,$lang='EN', $checkIsMenu=null) {
        if(is_null($checkIsMenu)){
            return self::where('Cate_ParentId',$id)
              ->where('Cate_Lang',$lang)
              ->where('Cate_State',1)
              ->select('Cate_Id','Cate_Title','Cate_Image','Cate_Intro','Cate_ExField1','Cate_IsMenu')
              ->orderBy('Cate_Order','ASC')
              ->get();
        }else{
            return self::where('Cate_ParentId',$id)
              ->where('Cate_Lang',$lang)
              ->where('Cate_State',1)
              ->where('Cate_IsMenu',$checkIsMenu)
              ->select('Cate_Id','Cate_Title','Cate_Image','Cate_Intro','Cate_ExField1','Cate_IsMenu')
              ->orderBy('Cate_Order','ASC')
              ->get();
        }
    }

    /**
     * 检查是否还有子目录
     */
    public function hasChild(){
        if(true){
            // 使用与父目录相同的语言
            return self::LoadCategoriesByParentId($this->Cate_Id, $this->Cate_Lang);
        }else{
            return false;
        }
    }

    public static function Fetch($id){
        return self::where('Cate_Id',$id)->first();
    }

    public static function FetchByTitle($title,$lang='EN'){
        return self::where('Cate_Title',$title)->where('Cate_Lang', $lang)->first();
    }

    public function news($limit = null){
        if($limit)
            return News::where('News_CateId',$this->Cate_Id)->orderBy('News_IsIndex','DESC')->orderBy('News_Order','Desc')->take($limit)->get();
        else
            return News::where('News_CateId',$this->Cate_Id)->orderBy('News_IsIndex','DESC')->orderBy('News_Order','Desc')->get();
    }

    public function baseInfos(){
        return BaseInfo::where('BaseInfo_CateId',$this->Cate_Id)
            ->where('BaseInfo_State','1')
            ->orderBy('BaseInfo_Order','Desc')
            ->get();
    }

    public function products(){
        return Product::where('Products_CateId',$this->Cate_Id)->orderBy('Products_Order','Desc')->get();
    }

    /**
     * 取得推荐产品
     * @return mixed
     */
    public function recommendProducts(){
        $subs = $this->hasChild();
//        dd($subs);
        if($subs){
            $ids = [];
            foreach ($subs as $sub) {
                $ids[] = $sub->Cate_Id;
            }

            return Product::whereIn('Products_CateId',$ids)
                ->where('Products_recommend',1)
                ->orderBy('Products_Order','Desc')->get();
        }else{
            return [];
        }
    }

    public function downloads($limit = null){
        if($limit){
            return Download::where('Down_CateId',$this->Cate_Id)->orderBy('Down_Order','Desc')->take($limit)->get();
        }else{
            return Download::where('Down_CateId',$this->Cate_Id)->orderBy('Down_Order','Desc')->get();
        }
    }

    public function solutions(){
        return $this->baseInfos();
    }

    /**
     * Generate Category uri
     * 产生
     * @return string
     */
    public function getIdString(){
        $uri = str_replace(' ','-',$this->Cate_Title).'__'.$this->Cate_Id;
        $uri = str_replace('/','-',$uri);
        return $uri;
    }
}
