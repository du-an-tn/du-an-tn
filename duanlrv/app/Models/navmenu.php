<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class navmenu extends Model
{
    use HasFactory;
    protected $table = 'nav_menu';
    protected $fillable = ['id','name_nav', 'slug','hidden'];
    public $timestamps = FALSE;

    public function products()
    {
       return $this->hasMany(category::class,'id_nav','id');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_nav','like','%'.$key.'%');
        }
        return $query;
    }
}
    