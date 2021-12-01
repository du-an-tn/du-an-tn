<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datlich extends Model
{
    use HasFactory;
    protected $table = 'dat_lich';
    protected $fillable = ['id','id_coso','id_user','id_nhucau','set_time','id_status'];
    public $timestamps = FALSE;

    public function nhucau(){
       return $this->hasOne(dichvucoso::class,'id','id_nhucau');
    }
    public function coso(){
        return $this->hasOne(coso::class,'id','id_coso');
    }
    public function user(){
        return $this->hasOne(account::class,'id','id_user');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('id','like','%'.$key.'%');
        }
        return $query;
    }
}
