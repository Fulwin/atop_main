<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class PagesController extends Controller
{
    //
    public function home(){
        // 新闻
        $newsCategory = Category::FetchByTitle('Company News',$this->currentLanguage);
        $this->dataForView['news'] = $newsCategory->news(5);
        $this->dataForView['banners'] = $this->_getHomeBanner();
        $this->dataForView['products'] = $this->_getNewProducts();
        return view('pages.home',$this->dataForView);
    }

    private function _getHomeBanner(){
        $homeBannerCategory = Category::Fetch(103,$this->currentLanguage);
        return $homeBannerCategory->baseInfos();
    }

    /**
     * 取得在首页显示的产品列表
     * @return array
     */
    private function _getNewProducts(){
//        $ids = [652,449,444,427,34];
        return Product::GetNew();
    }
}
