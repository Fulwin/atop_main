<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;

class PagesController extends Controller
{
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        // 新闻
        $newsCategory = Category::FetchByTitle('Company News',$this->currentLanguage);
        $this->dataForView['news'] = $newsCategory->news(5);
        $this->dataForView['banners'] = $this->_getHomeBanner();
        $this->dataForView['products'] = $this->_getNewProducts();
        $this->dataForView['isHome'] = true;
        return view('pages.home',$this->dataForView);
    }

    /**
     * 公司新闻
     * @param null $titleUrl
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View公司新闻
     */
    public function news($titleUrl=null){
        if($titleUrl == 'company'){
            // 公司新闻
            $category = Category::FetchByTitle('Company News', $this->currentLanguage);
            $this->dataForView['category'] = $category;
            $this->dataForView['news'] = $category->news();
            return view('news.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = News::Fetch($titleUrl);
            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['news'] = $newsArticle;
            $this->dataForView['prevOne'] = $newsArticle->prevOne();
            $this->dataForView['nextOne'] = $newsArticle->nextOne();
            return view('news.view',$this->dataForView);
        }
    }

    private function _getHomeBanner(){
        $homeBannerCategory = Category::Fetch(103,$this->currentLanguage);
        return $homeBannerCategory->news();
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
