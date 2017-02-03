<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon\Carbon;

class Download extends Model
{
    /**
     * 根据 News Id 取得数据库记录
     *
     * @param $news_Id
     * @return mixed
     */
    public static function Fetch($news_Id){
        return self::where('Down_Id',$news_Id)->first();
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
                    if($fieldName == 'Down_AddTime' && strlen($value) > 11){
                        $productToBeUpdate->Down_AddTime = Carbon::parse($value)->addDay(1)->toDateString();
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
        $download = self::create();
        if($data['Down_Order'] == 0){
            // 获取目前最大的 order 数字
            $latestDownload = self::where('Down_CateID',$data['Down_CateID'])->orderBy('Down_Order','DESC')->first();
            // 然后给新加的附上一个更大的
            $data['Down_Order'] = $latestDownload ? $latestDownload->Down_Order + 1 : 1;
        }
        if($data) {
            $Download_CateName = Category::Fetch($data['Down_CateID'])->Cate_Title;
            $data['Down_CateName'] = $Download_CateName;
            foreach ($data as $fieldName=>$value) {
                if($fieldName == 'Down_ID'){
                    $download->Down_ID = $download->id+1000;  // 防止有和以前重复的, 所以认为添加了200
                }elseif($fieldName == 'Down_AddTime'){
                    // 对时间进行了特殊的处理
                    $download->Down_AddTime = Carbon::parse($value)->addDay(1)->toDateString();
                }else{
                    $download->$fieldName = $value;
                }
            }
            return $download->save();
        }else{
            return false;
        }
    }
}
