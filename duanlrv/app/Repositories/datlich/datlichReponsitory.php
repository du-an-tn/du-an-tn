<?php
namespace App\Repositories\datlich;

use App\Repositories\EloquentRepository;
class datlichReponsitory extends EloquentRepository implements datlichInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\datlich::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}