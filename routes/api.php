<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/profile_update', 'UserController@profile_update');
Route::post('/profile_view', 'UserController@profile_view');
Route::post('/categories_api','CategoriesController@Categories_api');
Route::post('/vendors_api','VendorsController@vendors_api');
Route::post('/update_api','VendorsController@update_api');
Route::post('/delete_api','VendorsController@delete_api');
Route::post('/customers_api','CustomerController@customers_api');
Route::post('/customers_update','CustomerController@customer_update');
Route::post('/customers_view','CustomerController@customer_view');
Route::post('/product_add','ProductController@product_add');
Route::get('/download_api','VendorsController@download_api');
Route::post('/image_upload', 'BrandController@storeData');