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
            $solutionCategory = Category::FetchByTitle(
                $this->getCategoryTitle('Solution'),
                session('lang')
            );
            $this->dataForView['downloads'] = $solutionCategory->downloads();
            $this->dataForView['seo'] = [
              'keywords' => $solutionCategory->Cate_Title,
              'title' => $solutionCategory->Cate_Title,
              'description' => $solutionCategory->Cate_Title,
            ];
            return view('pages.solutions',$this->dataForView);
        }else{
            $download = Download::Fetch($downId);
            // 根据产品的目录取得所有被标识为 recommend 的产品
            $relatedCategory = Category::Fetch($download->related_category_name);
            $products = [];
            if($relatedCategory){
                $products = $relatedCategory->recommendProducts();
            }
            $this->dataForView['products'] = $products;
            $this->dataForView['download'] = $download;

            $this->dataForView['seo'] = [
              'keywords' => $download->Down_Title,
              'title' => $download->Down_Title,
              'description' => $download->Down_Title,
            ];
            return view('pages.solution_detail',$this->dataForView);
        }
    }

    public function support($downId = null){
        $download = Download::Fetch($downId);

        $this->dataForView['download'] = $download;

        $this->dataForView['seo'] = [
          'keywords' => $download->Down_Title,
          'title' => $download->Down_Title,
          'description' => $download->Down_Title,
        ];
        return view('pages.support',$this->dataForView);
    }

    /**
     * 下载页面
     */
    public function downloads(){
        $title = $this->getCategoryTitle('Download');
        $downloadCategory = Category::FetchByTitle($title,$this->_Get_Language());
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
            $techCategory = Category::FetchByTitle(
                $this->getCategoryTitle('Technology Support'),
                session('lang')
            );
            $downloadCategory = Category::FetchByTitle(
                $this->getCategoryTitle('Download'),
                session('lang')
            );
            $techs = $techCategory->downloads();
//            dd($techs);
            $this->dataForView['techs'] = $techs;
            $this->dataForView['downloadCategory'] = $downloadCategory;
            $this->dataForView['downloads'] = $downloadCategory->downloads();

            $this->dataForView['seo'] = [
              'keywords' => $techCategory->Cate_Title,
              'title' => $techCategory->Cate_Title,
              'description' => $techCategory->Cate_Title,
            ];
            return view('pages.services',$this->dataForView);
        }else{
            // 查看 Technology 的具体内容
            $tech = Download::Fetch($techId);
            $this->dataForView['tech'] = $tech;

            $this->dataForView['seo'] = [
              'keywords' => $tech->Down_Title,
              'title' => $tech->Down_Title,
              'description' => $tech->Down_Title,
            ];
            return view('pages.service_detail',$this->dataForView);
        }
    }

    public function contact_us(){
        $contactUsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Contact'),
            session('lang')
        );
        $joinUsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Join Us'),
            session('lang')
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

        $this->dataForView['seo'] = [
          'keywords' => $contactUsCategory->Cate_Title,
          'title' => $contactUsCategory->Cate_Title,
          'description' => $contactUsCategory->Cate_Title,
        ];
        return view('pages.contact_us',$this->dataForView);
    }

    public function about_us(Request $request){
        $newsCategory = Category::FetchByTitle(
            $this->getCategoryTitle('About'),
            session('lang')
        );
        $subs = $newsCategory->hasChild();

        // 企业文化
        $corporateCultureCategory = Category::FetchByTitle($this->getCategoryTitle('Corporate Culture'),session('lang'));
        $this->dataForView['aboutCategories'] = $subs;
        $this->dataForView['corporateCultureCategory'] = $corporateCultureCategory;

        $this->dataForView['seo'] = [
          'keywords' => $newsCategory->Cate_Title . ' ' . $corporateCultureCategory->Cate_Title,
          'title' => $newsCategory->Cate_Title . ' ' . $corporateCultureCategory->Cate_Title,
          'description' => $newsCategory->Cate_Title . ' ' . $corporateCultureCategory->Cate_Title,
        ];
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

            $this->dataForView['seo'] = [
              'keywords' => $category->Cate_Title,
              'title' => $category->Cate_Title,
              'description' => $category->Cate_Title,
            ];
            return view('quality.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = BaseInfo::Fetch($titleUrl);
            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $newsArticle;

            $this->dataForView['seo'] = [
              'keywords' => $newsArticle->News_Title,
              'title' => $newsArticle->News_Title,
              'description' => $newsArticle->News_Title,
            ];
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

            $this->dataForView['seo'] = [
              'keywords' => $category->Cate_Title,
              'title' => $category->Cate_Title,
              'description' => $category->Cate_Title,
            ];

            return view('culture.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = News::Fetch($titleUrl);
            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $newsArticle;

            $this->dataForView['seo'] = [
              'keywords' => $newsArticle->News_Title,
              'title' => $newsArticle->News_Title,
              'description' => $newsArticle->News_Title,
            ];
            return view('culture.view',$this->dataForView);
        }
    }

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request){
        // Home page SEO
        if($this->_Get_Language()=='EN'){
            $this->dataForView['seo'] = [
                'page_h1'=>'Optimize data communications with high speed optical transceivers',
                'page_h2'=>'The optic fiber and optical transceiver experts',
                'page_h2_second'=>'Buy wholesale sfp transceivers, dac cables, aoc cables and other optic fiber',
                'keywords' => 'sfp transceivers, optical transceivers, fiber optics, dac cables, aoc cables',
                'title' => 'SFP Transceivers - Optical Transceivers - DAC Cables | ATOP',
                'description' => 'ATOP Co. has an extensive variety of optical transceivers and sfp transceivers. Our optic fiber, including our sfp fibers, are quality and warranty ensured.',
            ];
        }
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

        /**
         * 视频文件
         */

        if($this->_Get_Language()=='EN'){
            $videoFile = '/Upload/Honor/jieshao.flv';
        }else{
            $videoFile = '/Upload/Honor/atop_cn_intro.flv';
        }
        $this->dataForView['videoFile'] = $videoFile;

        /*
         *  Solutions 部分
         */
        $solutionCategory = Category::FetchByTitle(
            $this->getCategoryTitle('Solution'),
            session('lang', 'EN')
        );
        $this->dataForView['downloads'] = $solutionCategory->downloads(4);

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
                $this->getCategoryTitle('Company News'),
                $this->_Get_Language()
            );
            $this->dataForView['category'] = $category;
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $category->news();
            $this->dataForView['modelPrefix'] = 'News';
            $this->dataForView['seo'] = [
              'keywords' => $category->Cate_Title,
              'title' => $category->Cate_Title,
              'description' => $category->Cate_Title,
            ];
            return view('news.list',$this->dataForView);
        } else {
            // 新闻的细节页面, ID
            $newsArticle = News::Fetch($titleUrl);

            // 新闻单页可能有特殊的 banner
//            $this->_Set_Special_Banner($titleUrl);

            $this->dataForView['category'] = $newsArticle->category();
            $this->dataForView['isNews'] = true;
            $this->dataForView['news'] = $newsArticle;
            $this->dataForView['prevOne'] = $newsArticle->prevOne();
            $this->dataForView['nextOne'] = $newsArticle->nextOne();

            $this->dataForView['seo'] = [
              'keywords' => $newsArticle->News_Title,
              'title' => $newsArticle->News_Title,
              'description' => $newsArticle->News_Title,
            ];

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

    public function load_wechat_image(){
        return view('pages.wechat');
    }
}
