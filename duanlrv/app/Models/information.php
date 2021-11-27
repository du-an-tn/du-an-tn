<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;
    protected $table = 'information_post';
    protected $fillable = ['id','type_post','title','id_menu','slug_product','id_category','age','status','render','price','discount','quantity','description','image','id_status','hidden'];
    public $timestamps = FALSE;

    public function typepost()
    {
       return $this->hasOne(typepost::class,'id','type_post');
    }
    public function category()
    {
       return $this->hasOne(category::class,'id','id_category');
    }
    public function navmenu()
    {
       return $this->hasOne(navmenu::class,'id','id_menu');
    }
    public function hastrangthai()
    {
       return $this->hasOne(trangthai::class,'id','id_status');
    }
    public function phandanhmuc()
    {
        return $this->belongsTo('App\Models\navmenu','id_menu');
    }
    public function gallery()
    {
        return $this->belongsTo('App\Models\gallery','id_product');
    }
    public function xetduyet()
    {
       return $this->hasMany(trangthai::class,'id_status','id');
    }
    public function danhmuc()
    {
       return $this->hasMany(category::class,'id_category','id');
    }


    public function menutexx()
    {
       return $this->hasMany(navmenu::class,'id_menu','id');
    }



    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('title','like','%'.$key.'%');
        }
        return $query;
    }
}
