<?php
namespace App\Repositories\news;

use App\Repositories\EloquentRepository;
class newsReponsitory extends EloquentRepository implements newsInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\news::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}