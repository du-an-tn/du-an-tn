<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['id','name_category','id_nav','slug','hidden'];
    public $timestamps = FALSE;

    public function cat()
    {
      return $this->hasOne(navmenu::class, 'id', 'id_nav');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_category','like','%'.$key.'%');
        }
        return $query;
    }
}
