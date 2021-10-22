<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/active-category-product/{category_product_id}', [categoryController::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_product_id}', [categoryController::class, 'unactive_category_product']);
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    Route::post("/select-delivery", "infoController@select_delivery");

    Route::resources([
        'menu' => 'menuController',
        'category' => 'categoryController',
        'qlthucung' => 'infoController',
        'qlsanpham' => 'productController',
        'news' => 'newsController',
        'slide' => 'slideController',
        'slide-quangcao' => 'sliquangcaoController',
        'account' => 'accountController',
    ]);
});



Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
