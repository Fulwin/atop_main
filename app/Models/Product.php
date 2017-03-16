<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon;

class Product extends Model
{
    public static function Fetch($news_Id){
        return self::where('Products_ID',$news_Id)->first();
    }

    /**
     * 取得这个产品所属的目录
     */
    public function category(){
        return Category::Fetch($this->Products_CateID);
    }

    public static function GetNew($limit=null){
        if($limit)
            return self::where('Products_IsNew',1)->take($limit)->get();
        else
            return self::where('Products_IsNew',1)->get();
    }

    public function getTitleUrl(){
        return str_replace(' ','__', $this->Products_Title);
    }

    public function getIdString(){
        return $this->id;
    }

    /**
     * 根据指定的 News Id 来删除一个记录
     * @param $news_Id
     * @return bool
     */
    public static function Remove($news_Id){
        $newsToBeDeleted = self::Fetch($news_Id);
        if($newsToBeDeleted){
            return $newsToBeDeleted->delete();
        }
        return true;
    }

    /**
     * 更新数据库的方法
     * @param $data
     * @return bool
     */
    public static function Modify($data){
        $productToBeUpdate = self::find($data['id']);
        if($productToBeUpdate){
            foreach ($data as $fieldName=>$value) {
                if($fieldName !== 'id'){
                    if($fieldName == 'Products_AddTime'){
                        $productToBeUpdate->Products_AddTime = Carbon::parse($value)->addDay(1)->toDateString();
                    }else{
                        $productToBeUpdate->$fieldName = $value;
                    }
                }
            }
            return $productToBeUpdate->save();
        }else{
            return false;
        }
    }

    public static function Persistent($data){
        $product = self::create();
        if($data['Products_Order'] == 0){
            // 获取目前最大的 order 数字
            $latestProduct = self::where('Products_CateID',$data['Products_CateID'])->orderBy('Products_Order','DESC')->first();
            // 然后给新加的附上一个更大的
            $data['Products_Order'] = $latestProduct->Products_Order + 1;
        }
        if($data) {
            $Product_CateName = Category::Fetch($data['Products_CateID'])->Cate_Title;
            $data['Products_CateName'] = $Product_CateName;
            foreach ($data as $fieldName=>$value) {
                if($fieldName == 'Products_ID'){
                    $product->Products_ID = $product->id+1000;  // 防止有和以前重复的, 所以认为添加了200
                }elseif($fieldName == 'Products_AddTime'){
                    $product->Products_AddTime = Carbon::parse($value)->addDay(1)->toDateString();
                }else{
                    $product->$fieldName = $value;
                }
            }
            return $product->save();
        }else{
            return false;
        }
    }
}
