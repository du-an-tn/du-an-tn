<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['id','name','id_nav','slug','hidden'];
    public $timestamps = FALSE;

    public function cat()
    {
      return $this->hasOne(navmenu::class, 'id', 'id_nav');
    }
    public function danhmuc()
    {
       return $this->hasMany(navmenu::class,'id_nav','id');
    }
    public function phandanhmuc()
    {
        return $this->belongsTo('App\Models\navmenu','id_nav');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
