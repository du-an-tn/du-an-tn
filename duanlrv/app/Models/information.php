<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;
    protected $table = 'information_post';
    protected $fillable = ['id','type_post','title','id_menu','id_category','age','status','render','price','discount','quantity','description','time','image','view','id_user','id_trang_thai','hidden'];
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
    public function trangthai()
    {
       return $this->hasOne(trangthai::class,'id','id_trang_thai');
    }
    public function xetduyet()
    {
       return $this->hasMany(trangthai::class,'id_trang_thai','id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('title','like','%'.$key.'%');
        }
        return $query;
    }
}
