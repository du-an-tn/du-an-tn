<?php
namespace App\Repositories\danhmuc;

use App\Repositories\EloquentRepository;
class categoryReponsitory extends EloquentRepository implements categoryInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\category::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}