<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteRequest;

class ProductsController extends Controller
{
    public function __construct(Request $request){
        parent::__construct($request);
        $this->dataForView['isProducts'] = true;
    }

    public function quoto_request(Request $request){
        $form = $request->all();
        $site = $this->dataForView['site'];
        $to = empty($site->quote_request_handler) ? 'sunbin@atoptechnology.com' : $site->quote_request_handler;
        $product = Product::where('Products_CodeName',$form['code'])->first();
        Mail::to($to)
              ->cc('sales@webmelbourne.com')
              ->send(new QuoteRequest($product, $form));

        $this->dataForView['product'] = $product;
        $this->dataForView['category'] = $product->category();

        return view('products.quote_success', $this->dataForView);
    }

    /**
     * 加载产品目录页
     * @param null $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function load_category($categoryId=null){
        $temp = explode('__',$categoryId);
        $categoryId = isset($temp[1]) ? $temp[1] : $categoryId;
        if($categoryId == 98){
            $categoryId = null;
        }

        if(is_null($categoryId) || $categoryId == 89 || $categoryId == 157){
            // 加载产品的根目录的请求
            $category = Category::Fetch($this->getRootCategoryId());
            $this->dataForView['category'] = $category;

            $this->dataForView['seo'] = [
              'keywords' => $category->Cate_Title,
              'title' => $category->Cate_Title,
              'description' => $category->Cate_Title,
            ];
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

            $this->dataForView['seo'] = [
                'keywords' => $category->Cate_Title,
                'title' => $category->Cate_Title,
                'description' => $category->Cate_Title,
            ];

            // 检查当前应该使用的语言并添加后缀
            $postfix = $this->_Get_Language()=='CN' ? 'CN':null;
            return view('products.category'.$postfix, $this->dataForView);
        }
    }

    /**
     * 加载产品详情单页
     * @param null $productId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($productId=null){
        $temp = explode('__',$productId);
        $productId = isset($temp[1]) ? $temp[1] : $productId;
        $product = Product::Fetch($productId);
        $this->dataForView['product'] = $product;
        $this->dataForView['category'] = $product->category();

        $Microdata = [
            'type' => 'http://schema.org/Product'
//            'image' => 'image',
//            'description' => 'description',
//            'name' => 'name',
//            'sku' => 'sku', // <div class="value" itemprop="sku">SFP-1000BASE-T</div>
//            'category' => 'category' // <div class="value" itemprop="sku">SFP-1000BASE-T</div>
        ];
        $this->dataForView['Microdata'] = $Microdata;
        $postfix = session('lang','EN') == 'EN' ? '' : 'CN';
        return view('products.view'.$postfix, $this->dataForView);
    }

    // 产品文件下载链接
    public function download_brochure($productId=null){
        $product = Product::Fetch($productId);
        return response()->download('/var/www/html/atop-backend/public'.$product->Products_FileIntro);
    }
}
