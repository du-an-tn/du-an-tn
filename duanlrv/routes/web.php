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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    Route::get('/file', 'AdminController@file')->name('admin.file');

    Route::post("/select-delivery", "infoController@select_delivery");
    Route::post("/select-thanhpho", "cosoController@select_thanhpho");
    Route::get('/chi-tiet-don-hang/{slug}', 'donhangController@chitietdh');

    Route::post("/update-trangthai", "donhangController@update_trangthai");
    Route::post("/filter-by-date", "AdminController@filter_by_date");
    Route::post("/order-date", "AdminController@order_date");
    Route::post("/dashboard-filter", "AdminController@dashboard_filter");
    Route::resources([
        'menu' => 'menuController',
        'category' => 'categoryController',
        'qlthucung' => 'infoController',
        'qlsanpham' => 'productController',
        'qldichvu' => 'cosoController',
        'chitietdichvu' => 'dichvuController',
        'coupon' => 'couponController',
        'news' => 'newsController',
        'donhang' => 'donhangController',
        'chitietdh' => 'shipingController',
        'slide' => 'slideController',
        'slide-quangcao' => 'sliquangcaoController',
        'account' => 'accountController',
    ]);
});

// Route::group(['prefix' => 'user'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/chitiet', 'HomeController@productDetail')->name('productDetail');
    Route::get('/cua-hang', 'HomeController@products')->name('products');
    Route::get('/checkout', 'HomeController@dichvu')->name('dichvu');
    Route::get('/addToCart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
    Route::get('/gio-hang', [HomeController::class, 'cartViews'])->name('cartViews');
    Route::get('/update-cart', [HomeController::class, 'updateCart'])->name('updateCart');
    Route::get('/delete-cart', [HomeController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/remove-cart', [HomeController::class, 'removeCart'])->name('removeCart');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');




    // Route::get('/danh-muc-phu-kien', [categoryController::class, 'show_category_phukien']);   
    // Route::get('/danh-muc-san-pham/{slug_category_product}', [categoryController::class, 'show_category_home']);
    // Route::get('/chi-tiet-san-pham/{slug}', [productController::class, 'chi_tiet_san_pham']);    
    // Route::get('/active-category-product/{category_product_id}', [categoryController::class, 'active_category_product']);
    // Route::get('/unactive-category-product/{category_product_id}', [categoryController::class, 'unactive_category_product']);

// });

Auth::routes();

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/trang-chu', [HomeController::class, 'index']);
