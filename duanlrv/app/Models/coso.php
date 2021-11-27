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


    public function dichvu()
    {
       return $this->hasMany(dichvucoso::class,'id','id_nhiemvu');
    }

    public function thanhpho()
    {
       return $this->hasOne(thanhpho::class,'matp','id_province');
    }
    public function quanhuyen()
    {
       return $this->hasOne(quanhuyen::class,'id','id_quanhuyen');
    }
    public function xaphuong()
    {
       return $this->hasOne(xaphuong::class,'id','id_xaphuong');
    }
    public function xetduyet()
    {
       return $this->hasOne(trangthai::class,'id','id_status');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_coso','like','%'.$key.'%');
        }
        return $query;
    }
}
