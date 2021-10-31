<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $fillable = ['coupon_id','coupon_name','coupon_date_start','coupon_date_end','coupon_condition','coupon_code','coupon_number','id_status'];
    public $timestamps = FALSE;


    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('coupon_name','like','%'.$key.'%');
        }
        return $query;
    }
}
