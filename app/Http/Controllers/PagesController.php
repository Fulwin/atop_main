<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use App\Models\BaseInfo;

class PagesController extends Controller
{
    public function about_us(){
        $newsCategory = Category::FetchByTitle('About',$this->currentLanguage);
        $subs = $newsCategory->hasChild();
        $baseInfos = [];
        foreach ($subs as $sub) {
            $items = $sub->baseInfos();
            if($items) {
                foreach ($items as $item) {
                    $baseInfos[] = $item;
                }
            }
        }
        $this->dataForView['baseInfos'] = $baseInfos;
        return view('pages.about_us',$this->dataForView);
    }

    public function quality_control($titleUrl=null){
        // quality control
        if(!$titleUrl){
            // quality control
            $category = Category::FetchByTitle('Quality Control', $this->currentLanguage);
            $this->dataForView['category'] = $category;
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $category->baseInfos();
            return view('quality.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = BaseInfo::Fetch($titleUrl);
            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $newsArticle;
            return view('quality.view',$this->dataForView);
        }
    }

    public function corporate_culture($titleUrl=null){
        // quality control
        if(!$titleUrl){
            // quality control
            $category = Category::FetchByTitle('Corporate Culture', $this->currentLanguage);
            $this->dataForView['category'] = $category;
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $category->news();
            return view('culture.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = News::Fetch($titleUrl);
            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $newsArticle;
            return view('culture.view',$this->dataForView);
        }
    }

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

        /**
         * 首页上的产品区
         */
        $tree = $this->_getCategoriesTree($this->productsRootCategoryId, $this->currentLanguage);
        $this->dataForView['tree'] = $tree;

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
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $category->news();
            $this->dataForView['modelPrefix'] = 'News';
            return view('news.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = News::Fetch($titleUrl);
            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $newsArticle;
            $this->dataForView['prevOne'] = $newsArticle->prevOne();
            $this->dataForView['nextOne'] = $newsArticle->nextOne();
            return view('news.view',$this->dataForView);
        }
    }

    private function _getHomeBanner(){
        $homeBannerCategory = Category::Fetch(103);
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
