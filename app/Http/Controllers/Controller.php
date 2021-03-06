<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $dataForView = [
        // seo 相关
        'page_title'=>'Atop Technology',
        'page_h1'=>'',
        'page_h2'=>'',
        'page_h2_second'=>'',
        'page_meta_description'=>'Atop Technology',
        'page_meta_keywords'=>'Atop Technology',
        'upload_files_prefix' => 'https://www.atoptechnology.com/',
        'currentLanguage'=>null,
        'isHome' => false,
        'special_banner_image' => false  // 用来显示特殊的 banner
    ];
    public $sessionData = null;
    public $currentLanguage = 'EN';
    public $productsRootCategoryId = 89;

    public function __construct(){
        if($_SERVER['SERVER_NAME']=='www.atoptechnology.com.cn'){
            session(['lang'=>'CN']);
        }else{
            session(['lang'=>'EN']);
        }


        $this->currentLanguage = session('lang') ? session('lang','EN') : 'EN';
        $this->dataForView['currentLanguage'] = $this->currentLanguage;

        $this->dataForView['footerLinks'] = [
            'about' => $this->getLinks('About'),
            'products' => $this->getLinks('Products'),
            'solution' => $this->getLinks('Solution'),
            'contact' => $this->getLinks('Contact')
        ];

        $this->dataForView['tree'] = $this->_getCategoriesTree(
            $this->getRootCategoryId(),
            session('lang','EN')
        );

        $this->dataForView['site'] = Site::find(1);
    }

    public function getRootCategoryId(){
        return session('lang','EN')==='EN' ? 89 : 157;
    }

    public function getLinks($title){
        $category = Category::FetchByTitle(
            $this->getCategoryTitle($title),
            session('lang','EN')
        );

        if($title=='Solution'){
            return [
                'data' => $category,
                'subs' => $category->downloads()
            ];
        }

        return [
            'data'  =>  $category,
            'subs'  =>  Category::LoadCategoriesByParentId($category->Cate_Id, session('lang', 'EN'))
        ];
    }

    /**
     * 根据给定的级别加载目录树
     * @param int $parentId
     * @param string $lang
     * @return array
     */
    public function _getCategoriesTree($parentId = 0, $lang = 'EN'){
        $tree = [];

        $topLevelCategories = Category::LoadCategoriesByParentId($parentId,$lang);
        foreach ($topLevelCategories as $topLevelCategory) {
            // 第一级目录循环
            $bean = [
                'data' => $topLevelCategory,
                'subs' => []
            ];

            $subs = Category::LoadCategoriesByParentId($topLevelCategory->Cate_Id, $lang);
            if(count($subs)){
                foreach ($subs as $secondLevelCategory) {
                    // 第二级目录循环
                    $subBeanSecond = [
                        'data' => $secondLevelCategory,
                        'subs' => []
                    ];
                    $subsSubs = Category::LoadCategoriesByParentId($secondLevelCategory->Cate_Id,$lang);
                    if(count($subsSubs) > 0){
                        // 第三级目录循环
                        $subBeanThird = [];
                        foreach ($subsSubs as $thirdLevelCategory) {
                            $subBeanThird[$thirdLevelCategory->Cate_Id] = [
                                'data' => $thirdLevelCategory,
                                'subs' => []
                            ];
                        }
                        $subBeanSecond['subs'] = $subBeanThird;
                    }
                    // 把包含所有子目录的数组添加到第一级的 subs 中
                    $bean['subs'][$secondLevelCategory->Cate_Id] = $subBeanSecond;
                }
            }
            $tree[$topLevelCategory->Cate_Id] = $bean;
        }

        return $tree;
    }

    public function getCategoryTitle($titleInEn){

        if(session('lang','EN') == 'EN')
            return $titleInEn;

        $data = [
            'Company News' => '公司新闻',
            'Solution' => '解决方案',
            'About' => '关于我们',
            'Products' => '产品中心',
            'Corporate Culture' => '企业文化',
            'Join Us' => '加入我们',
            'Download' => '下载',
            'Technology Support' => '技术支持',
            'Contact'=>'联系我们'
        ];
        return $data[$titleInEn];
    }

    /**
     * 检查当前应该使用的语言
     */
    public function _Get_Language(){
        return $_SERVER['SERVER_NAME']=='www.atoptechnology.com.cn' ? 'CN' : 'EN';
    }

    /**
     * 设置特殊 banner 图片的方法
     * @param $title
     */
    public function _Set_Special_Banner($title){
        if($this->_Get_Language()=='EN'){
            $locationBase = '/var/www/html/atop/public/Upload/ATOPTechnology/news/';
        }else{
            $locationBase = '/var/www/html/atop_main/public/Upload/ATOPTechnology/news/';
        }
        if(file_exists($locationBase.'news'.$title.'.jpg')){
            $this->dataForView['special_banner_image'] = '/Upload/ATOPTechnology/news/news'.$title.'.jpg';
        }
    }
}
