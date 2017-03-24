<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AjaxController extends Controller
{
    //
    public function search_ajax(Request $request){
        $keyword = $request->get('term');
        $products = Product::Search($keyword);
        $result = [];
        if($products){
            foreach ($products as $product) {
                $result[] = [
                    'id' => $product->Products_ID,
                    'label' => $product->Products_Title,
                    'value' => $product->Products_Title
                ];
            }
        }
        return $result;
    }
}
