<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = ['id','order_code','product_id','product_name','product_price','product_quantity','product_coupon','product_freeship'];
    public $timestamps = FALSE;
    public function donhang()
    {
       return $this->hasOne(donhang::class,'order_id','order_id');
    }

}
