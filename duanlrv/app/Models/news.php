<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = ['id','name_post','slug','description','view','hidden'];
    public $timestamps = FALSE;



    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_nav','like','%'.$key.'%');
        }
        return $query;
    }
}
