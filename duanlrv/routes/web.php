<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\accountController;

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

    Route::post("/select-delivery", "infoController@select_delivery");
    Route::get('/chi-tiet-don-hang/{slug}', 'donhangController@chitietdh');

    Route::resources([
        'menu' => 'menuController',
        'category' => 'categoryController',
        'coupon' => 'couponController',
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
Route::get('/danh-muc-phu-kien', [categoryController::class, 'show_category_phukien']);   
Route::get('/danh-muc-san-pham/{slug_category_product}', [categoryController::class, 'show_category_home']);

Route::get('/chi-tiet-san-pham/{slug}', [productController::class, 'chi_tiet_san_pham']);    
Route::post('/insert-rating', [productController::class, 'insert_rating']);   

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/active-category-product/{category_product_id}', [categoryController::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_product_id}', [categoryController::class, 'unactive_category_product']);
//account
Route::get('/register', [accountController::class, 'register']);
Route::post('/check-register', [accountController::class, 'check_register']);

Route::get('/login-customer', [accountController::class, 'login_customer']);
Route::post('/check-login', [accountController::class, 'check_login']);
Route::get('/logout', [accountController::class, 'logout']);
Route::get('/show-profile', [accountController::class, 'show_profile'])->middleware('account');
Route::post('/update-profile', [accountController::class, 'update_profile'])->middleware('account');
Route::post('/account-rating', [accountController::class, 'account_rating'])->middleware('account');