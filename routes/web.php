<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'PagesController@home');
    Route::get('/about_us', 'PagesController@about_us');
    Route::get('/contact_us', 'PagesController@contact_us');
    Route::get('/load_wechat_image', 'PagesController@load_wechat_image');
    Route::get('/solutions/{downId?}', 'PagesController@solutions');
    Route::get('/services/{techId?}', 'PagesController@services');
    Route::get('/downloads', 'PagesController@downloads');
    Route::get('/support/{downId?}', 'PagesController@support');
    Route::get('/quality_control/{titleUrl?}', 'PagesController@quality_control');
    Route::get('/corporate_culture/{titleUrl?}', 'PagesController@corporate_culture');
    Route::get('/news/{titleUrl?}', 'PagesController@news');


    Route::get('/switch_language/{lang}', 'PagesController@switch_language');
    Route::get('/products/search_ajax', 'AjaxController@search_ajax');
    Route::get('/product/view/{productId?}', 'ProductsController@view');

    /**
     * 菜单栏中的搜索表单提交后的响应
     */
    Route::get('/search_products', 'ProductsController@search');

    /**
     * 加载产品单页的路径
     */
    Route::get('/products/{categoryId?}', 'ProductsController@load_category');
    Route::get('/download_brochure/{productId?}', 'ProductsController@download_brochure');
    /**
     * 处理提交 quote 的表单
     */
    Route::post('/quoto_request', 'ProductsController@quoto_request');
});
