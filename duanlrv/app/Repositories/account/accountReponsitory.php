<?php
namespace App\Repositories\account;

use App\Repositories\EloquentRepository;
class accountReponsitory extends EloquentRepository implements accountInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\account::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}