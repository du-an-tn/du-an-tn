<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\navmenu;
use App\Models\category;
use App\Models\datlich;
use App\Models\donhang;
use App\Models\account;
use Carbon\Carbon;
use App\Controllers\HomeController;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            // menu
            \App\Repositories\menu\navmenuInterface::class,
            \App\Repositories\menu\navmenuReponsitory::class,
        );
        $this->app->singleton(
            // danh mục (category)
            \App\Repositories\danhmuc\categoryInterface::class,
            \App\Repositories\danhmuc\categoryReponsitory::class,
        );
        $this->app->singleton(
            // quản lý thú cưng
            \App\Repositories\qlthucung\qlthucungInterface::class,
            \App\Repositories\qlthucung\qlthucungReponsitory::class,
        );
        $this->app->singleton(
            // quản lý sản phẩm
            \App\Repositories\qlsanpham\qlsanphamInterface::class,
            \App\Repositories\qlsanpham\qlsanphamReponsitory::class,
        );
        $this->app->singleton(
            // tin tức
            \App\Repositories\news\newsInterface::class,
            \App\Repositories\news\newsReponsitory::class,
        );
        $this->app->singleton(
            // đơn hàng
            \App\Repositories\donhang\donhangInterface::class,
            \App\Repositories\donhang\donhangReponsitory::class,
        );
        $this->app->singleton(
            // đơn hàng chi tiết
            \App\Repositories\chitietdonhang\chitietdhInterface::class,
            \App\Repositories\chitietdonhang\chitietdhReponsitory::class,
        );
        $this->app->singleton(
            // mã giảm giá
            \App\Repositories\coupon\couponInterface::class,
            \App\Repositories\coupon\couponReponsitory::class,
        );
        $this->app->singleton(
            // account
            \App\Repositories\account\accountInterface::class,
            \App\Repositories\account\accountReponsitory::class,
        );
        $this->app->singleton(
            // quản lý dịch vụ shop
            \App\Repositories\qldichvu\qldichvuInterface::class,
            \App\Repositories\qldichvu\qldichvuReponsitory::class,
        );
        $this->app->singleton(
            // quản lý dịch vụ shop 2
            \App\Repositories\chitietdichvu\chitietdichvuInterface::class,
            \App\Repositories\chitietdichvu\chitietdichvuReponsitory::class,
        );
        $this->app->singleton(
            // quản lý dịch vụ đặt lịch
            \App\Repositories\datlich\datlichInterface::class,
            \App\Repositories\datlich\datlichReponsitory::class,
        );
        $this->app->singleton(
            // quản lý slide
            \App\Repositories\slide\slideInterface::class,
            \App\Repositories\slide\slideReponsitory::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer(['Site.*','admin.*'],function($view){
            // $view->with('thongtin', datlich::orderBy('id','ASC')->get());
            $view->with('thongtin', datlich::orderBy('id','desc')->whereBetween('set_time',
            [
            Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(),
            Carbon::now('Asia/Ho_Chi_Minh')
            ])->get());
            $view->with('ttcount', datlich::orderBy('id','desc')->whereBetween('set_time',
            [
            Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(),
            Carbon::now('Asia/Ho_Chi_Minh')
            ])->get());
            $view->with('donhangcount', donhang::orderBy('order_id', 'desc')->whereBetween('order_date',
            [
            Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(),
            Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
            ])->get());
            $view->with('ttaccount', account::orderBy('id','asc')->get());
            $view->with('categoryNav', navmenu::orderBy('id','asc')->get());
        });

        // $carts= session()->get('cart');
        // return View('site.layout',compact('carts'));
        Paginator::useBootstrap();


    }
}
