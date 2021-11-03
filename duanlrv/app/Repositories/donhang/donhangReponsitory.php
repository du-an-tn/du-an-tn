<?php
namespace App\Repositories\donhang;

use App\Repositories\EloquentRepository;
class donhangReponsitory extends EloquentRepository implements donhangInterface
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