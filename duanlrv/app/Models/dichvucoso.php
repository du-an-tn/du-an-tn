<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dichvucoso extends Model
{
    use HasFactory;
    protected $table = 'nhiemvu_coso';
    protected $fillable = ['id','name_dichvu','id_status'];
    public $timestamps = FALSE;



    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_dichvu','like','%'.$key.'%');
        }
        return $query;
    }
}
