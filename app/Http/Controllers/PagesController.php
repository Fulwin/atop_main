<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use App\Models\BaseInfo;
use App\Models\Download;
Use Session;
Use URL;

class PagesController extends Controller
{
    public function __construct(Request $request){
        parent::__construct($request);
    }
    /**
     * 切换语言
     * @param string $lang
     */
    public function switch_language($lang='EN', Request $request){
        $request->session()->set('lang',$lang);
        return redirect(URL::previous());
    }

    /**
     * Solutions 页面
     * @param null $downId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function solutions($downId = null){
        if(is_null($downId)){
            $solutionCategory = Category::FetchByTitle('Solution',session('lang', 'EN'));
            $this->dataForView['downloads'] = $solutionCategory->downloads();
            return view('pages.solutions',$this->dataForView);
        }else{
            $download = Download::Fetch($downId);
            $this->dataForView['download'] = $download;
            return view('pages.solution_detail',$this->dataForView);
        }
    }

    public function support($downId = null){
        $download = Download::Fetch($downId);

        $this->dataForView['download'] = $download;

        return view('pages.support',$this->dataForView);
    }

    /**
     * 下载页面
     */
    public function downloads(){
        $downloadCategory = Category::FetchByTitle('Download',session('lang', 'EN'));
        $downloads = $downloadCategory->downloads();
        $this->dataForView['downloads'] = $downloads;
        return view('pages.downloads',$this->dataForView);
    }

    /**
     * Service & Support 页面
     * @param null $techId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function services($techId = null){
        if(is_null($techId)){
            $techCategory = Category::FetchByTitle('Technology Support',session('lang', 'EN'));
            $downloadCategory = Category::FetchByTitle('Download',session('lang', 'EN'));
            $techs = $techCategory->downloads();
            $this->dataForView['techs'] = $techs;
            $this->dataForView['downloadCategory'] = $downloadCategory;
            $this->dataForView['downloads'] = $downloadCategory->downloads();
            return view('pages.services',$this->dataForView);
        }else{
            // 查看 Technology 的具体内容
            $tech = Download::Fetch($techId);
            $this->dataForView['tech'] = $tech;
            return view('pages.service_detail',$this->dataForView);
        }
    }

    public function contact_us(){
        $contactUsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Contact')
        );
        $joinUsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Join Us')
        );
        $contactSubsCategories = $contactUsCategory->hasChild();

        $baseInfos = [];

        foreach ($contactSubsCategories as $sub) {
            $articles = $sub->baseInfos();
            if($articles){
                foreach ($articles as $item) {
                    $baseInfos[] = $item;
                }
            }
        }
        $this->dataForView['baseInfos'] = $baseInfos;
        $this->dataForView['contactSubsCategories'] = $contactSubsCategories;
        $this->dataForView['joinUsCategory'] = $joinUsCategory;

        return view('pages.contact_us',$this->dataForView);
    }

    public function about_us(Request $request){
        $newsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('About')
        );
        $subs = $newsCategory->hasChild();

        // 企业文化
        $corporateCultureCategory = Category::FetchByTitle($this->getCategoryTitle('Corporate Culture'));
        $this->dataForView['aboutCategories'] = $subs;
        $this->dataForView['corporateCultureCategory'] = $corporateCultureCategory;
        return view('pages.about_us',$this->dataForView);
    }

    public function quality_control($titleUrl=null){
        // quality control
        if(!$titleUrl){
            // quality control
            $category = Category::FetchByTitle('Quality Control', session('lang', 'EN'));
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
            $category = Category::FetchByTitle('Corporate Culture', session('lang', 'EN'));
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
    public function home(Request $request){
        // 新闻
        $newsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Company News'),
            session('lang','EN')
        );
        $this->dataForView['news'] = $newsCategory->news(6);  // 只要6个就够了
        $this->dataForView['banners'] = $this->_getHomeBanner();
        $this->dataForView['products'] = $this->_getNewProducts();
        $this->dataForView['isHome'] = true;

        /**
         * 首页上的产品区
         */
        $tree = $this->_getCategoriesTree($this->getRootCategoryId(), session('lang', 'EN'));
        $this->dataForView['tree'] = $tree;

        /*
         *  Solutions 部分
         */
        $solutionCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Solution'),
            session('lang', 'EN')
        );
        $this->dataForView['downloads'] = $solutionCategory->downloads();

        return view('pages.home',$this->dataForView);
    }

    /**
     * 公司新闻
     * @param null $titleUrl
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View公司新闻
     */
    public function news($titleUrl=null){
        if($titleUrl == 'company' || is_null($titleUrl)){
            // 公司新闻
            $category = Category::FetchByTitle(
                $this->getCategoryTitle('Company News')
            );
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
        $homeBannerCategory = Category::FetchByTitle('HomeBannar',session('lang', 'EN'));
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
