<?php
namespace App\Repositories\qlsanpham;

use App\Repositories\EloquentRepository;
class qlsanphamReponsitory extends EloquentRepository implements qlsanphamInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\information::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}