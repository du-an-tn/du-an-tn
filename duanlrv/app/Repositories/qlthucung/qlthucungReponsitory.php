<?php
namespace App\Repositories\qlthucung;

use App\Repositories\EloquentRepository;
class qlthucungReponsitory extends EloquentRepository implements qlthucungInterface
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