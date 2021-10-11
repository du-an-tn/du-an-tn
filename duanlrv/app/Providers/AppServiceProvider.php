<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use App\Models\navmenu;
use App\Models\category;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        
        Paginator::useBootstrap();
    }
}
