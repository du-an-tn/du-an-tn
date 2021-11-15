<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coso extends Model
{
    use HasFactory;
    protected $table = 'coso_thucung';
    protected $fillable = ['id','name_coso','time_hoatdong','time_ketthuc','phone_coso','address_cuthe','id_xaphuong','id_quanhuyen','id_province','image','description','id_nhiemvu','id_status'];
    public $timestamps = FALSE;


    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_coso','like','%'.$key.'%');
        }
        return $query;
    }
}
