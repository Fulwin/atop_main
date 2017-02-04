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

    public function getLinks($title){
        $category = Category::FetchByTitle($title,$this->currentLanguage);
        return [
            'data'  =>  $category,
            'subs'  =>  Category::LoadCategoriesByParentId($category->Cate_Id, $this->currentLanguage)
        ];
    }
}
