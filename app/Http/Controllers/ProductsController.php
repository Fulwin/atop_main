<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    private $productsRootCategoryId = 89;
    public function load_category($categoryId=null){
        $this->dataForView['isProducts'] = true;
        $tree = $this->_getCategoriesTree($this->productsRootCategoryId, $this->currentLanguage);
        $this->dataForView['tree'] = $tree;

        if(is_null($categoryId)){
            // 加载产品的根目录的请求
            $category = Category::Fetch($this->productsRootCategoryId);
            $this->dataForView['category'] = $category;
            return view('products.root', $this->dataForView);
        } else {
            // 加载子目录
            $category = Category::Fetch($categoryId);
            $this->dataForView['parent'] = $category->parent();
            $this->dataForView['category'] = $category;
            $this->dataForView['subs'] = $this->_getCategoriesTree($categoryId, $this->currentLanguage);
            return view('products.category', $this->dataForView);
        }
    }

    /**
     * 根据给定的级别加载目录树
     * @param int $parentId
     * @param string $lang
     * @return array
     */
    private function _getCategoriesTree($parentId = 0, $lang = 'EN'){
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
}
