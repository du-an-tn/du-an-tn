<?php
namespace App\Repositories\chitietdichvu;

use App\Repositories\EloquentRepository;
class chitietdichvuReponsitory extends EloquentRepository implements chitietdichvuInterface
{
    /**
     * @return string 
     * 
     *
     */
    public function getModel()
    {
        return \App\Models\dichvucoso::class;
    }
    // public function orderBy()
    // {
    //     return navmenu::orderBy('id', 'ASC')->search()->paginate(10);
    // }

}