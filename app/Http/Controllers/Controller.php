<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $dataForView = [
        'upload_files_prefix' => 'http://atop_admin.webmelbourne.com/',
        'currentLanguage'=>null,
        'isHome' => false
    ];
    public $sessionData = null;
    public $currentLanguage = 'EN';
    public $productsRootCategoryId = 89;

    public function __construct(){
        $this->currentLanguage = session('lang') ? session('lang') : 'EN';
        $this->dataForView['currentLanguage'] = $this->currentLanguage;
        $this->dataForView['footerLinks'] = [
            'about' => $this->getLinks('About'),
            'products' => $this->getLinks('Products'),
            'solution' => $this->getLinks('Solution'),
            'contact' => $this->getLinks('Contact')
        ];
    }

    public function getCurrentLanguage(){
        return session('lang');
    }

    public function getRootCategoryId(){
        return session('lang')==='EN' ? 89 : 157;
    }

    public function getLinks($title){
        $category = Category::FetchByTitle($title,$this->currentLanguage);
        return [
            'data'  =>  $category,
            'subs'  =>  Category::LoadCategoriesByParentId($category->Cate_Id, $this->currentLanguage)
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
        if($this->getCurrentLanguage() === 'EN')
            return $titleInEn;

        $data = [
            'Company News' => '公司新闻',
            'Solution' => '解决方案',
        ];
        return $data[$titleInEn];
    }
}
