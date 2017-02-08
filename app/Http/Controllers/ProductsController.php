<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->dataForView['isProducts'] = true;
    }

    /**
     * 加载产品目录页
     * @param null $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function load_category($categoryId=null){
        if(is_null($categoryId)){
            // 加载产品的根目录的请求
            $category = Category::Fetch($this->getRootCategoryId());
            $this->dataForView['category'] = $category;
            return view('products.root', $this->dataForView);
        } else {
            // 加载子目录
            $category = Category::Fetch($categoryId);
            $this->dataForView['category'] = $category;
            $this->dataForView['parent'] = $category->parent();

            // 当前目录所包含的产品
            $this->dataForView['products'] = $category->products();

            // 当前目录所包含的子目录
            $this->dataForView['subs'] = [];

            // 检查是否还有子目录
            if($category->hasChild()){
                $this->dataForView['subs'] = $this->_getCategoriesTree($categoryId, session('lang','EN'));
            }

            return view('products.category', $this->dataForView);
        }
    }

    /**
     * 加载产品详情单页
     * @param null $productId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($productId=null){
        $product = Product::Fetch($productId);
        $this->dataForView['product'] = $product;
        $this->dataForView['category'] = $product->category();
        return view('products.view', $this->dataForView);
    }
}
