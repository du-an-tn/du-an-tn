<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xaphuong extends Model
{
    use HasFactory;
    protected $table = 'xaphuong_thitran';
    protected $fillable = ['id','name_xaphuong','type','maqh'];
    public $timestamps = FALSE;

    public function quanhuyen()
    {
       return $this->hasOne(quanhuyen::class,'maqh','id');
    }
}
