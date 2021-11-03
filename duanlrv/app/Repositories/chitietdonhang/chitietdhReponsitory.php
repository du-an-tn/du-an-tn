<?php
namespace App\Repositories\chitietdonhang;

use App\Repositories\EloquentRepository;
class chitietdhReponsitory extends EloquentRepository implements chitietdhInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\donhang::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}