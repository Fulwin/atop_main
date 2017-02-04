<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{

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
}
