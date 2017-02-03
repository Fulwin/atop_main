<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $dataForView = [
        'upload_files_prefix' => 'http://atop_admin.webmelbourne.com/',
        '$currentLanguage'=>null
    ];
    public $sessionData = null;
    public $currentLanguage = 'EN';

    public function __construct(){
        $this->currentLanguage = session('lang') ? session('lang') : 'EN';
        $this->dataForView['currentLanguage'] = $this->currentLanguage;
    }
}
