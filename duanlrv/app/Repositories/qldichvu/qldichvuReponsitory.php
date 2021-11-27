<?php
namespace App\Repositories\qldichvu;

use App\Repositories\EloquentRepository;
class qldichvuReponsitory extends EloquentRepository implements qldichvuInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\coso::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}