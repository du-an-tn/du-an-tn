<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $table = 'order_product';
    protected $fillable = ['order_id','order_date','order_code','product_id','quantity','amount','status'];
    protected $primaryKey = 'order_id';
    public $timestamps = FALSE;


    public function shiping()
    {
       return $this->hasOne(shiping::class,'order_id','id');
    }
    public function inship()
    {
       return $this->hasOne(information::class,'id','product_id');
    }
    public function dsuser()
    {
       return $this->hasOne(account::class,'id','id_user');
    }

    public function xetduyet()
    {
       return $this->hasMany(trangthai::class,'id_status','id');
    }
    public function donhang()
    {
       return $this->hasOne(orderDetail::class,'order_id','order_id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('order_code','like','%'.$key.'%');
        }
        return $query;
    }
}
