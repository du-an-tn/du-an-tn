<?php
namespace App\Repositories\menu;

use App\Repositories\EloquentRepository;
class navmenuReponsitory extends EloquentRepository implements navmenuInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\navmenu::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}