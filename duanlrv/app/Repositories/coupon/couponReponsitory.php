<?php
namespace App\Repositories\coupon;

use App\Repositories\EloquentRepository;
class couponReponsitory extends EloquentRepository implements couponInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\coupon::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}