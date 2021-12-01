<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    use HasFactory;
    protected $table = 'slider';
    protected $fillable = ['id','image','danh_muc','tieu_de','thong_tin','khuyen_mai','link','hidden'];
    public $timestamps = FALSE;
    public function danhmuc()
    {
        return $this->hasOne(navmenu::class,'id','danh_muc');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('tieu_de','like','%'.$key.'%');
        }
        return $query;
    }
}
