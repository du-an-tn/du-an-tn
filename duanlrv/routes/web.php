<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;

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
Route::get('/danh-muc-phu-kien', [categoryController::class, 'show_category_phukien']);   
Route::get('/danh-muc-san-pham/{slug_category_product}', [categoryController::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{slug}', [productController::class, 'chi_tiet_san_pham']);    
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/active-category-product/{category_product_id}', [categoryController::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_product_id}', [categoryController::class, 'unactive_category_product']);
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    Route::post("/select-delivery", "infoController@select_delivery");
    Route::get('/chi-tiet-don-hang/{slug}', 'donhangController@chitietdh');

    Route::resources([
        'menu' => 'menuController',
        'category' => 'categoryController',
        'qlthucung' => 'infoController',
        'qlsanpham' => 'productController',
        'news' => 'newsController',
        'donhang' => 'donhangController',
        'chitietdh' => 'shipingController',
        'slide' => 'slideController',
        'slide-quangcao' => 'sliquangcaoController',
        'account' => 'accountController',
    ]);
});



Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
