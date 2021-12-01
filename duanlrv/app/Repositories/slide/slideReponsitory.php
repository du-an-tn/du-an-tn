<?php
namespace App\Repositories\slide;

use App\Repositories\EloquentRepository;
class slideReponsitory extends EloquentRepository implements slideInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\slide::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}