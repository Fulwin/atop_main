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

Route::get('/', 'PagesController@home');
Route::get('/about_us', 'PagesController@about_us');
Route::get('/contact_us', 'PagesController@contact_us');
Route::get('/solutions', 'PagesController@solutions');
Route::get('/services/{techId?}', 'PagesController@services');
Route::get('/support/{downId?}', 'PagesController@support');
Route::get('/quality_control/{titleUrl?}', 'PagesController@quality_control');
Route::get('/corporate_culture/{titleUrl?}', 'PagesController@corporate_culture');
Route::get('/news/{titleUrl?}', 'PagesController@news');
Route::get('/products/{categoryId?}', 'ProductsController@load_category');

/**
 * 加载产品单页的路径
 */
Route::get('/product/view/{productId?}', 'ProductsController@view');
