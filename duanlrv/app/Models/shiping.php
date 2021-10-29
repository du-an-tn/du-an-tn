<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shiping extends Model
{
    use HasFactory;
    protected $table = 'shiping';
    protected $fillable = 
    [
        'id','id_user',
        'order_id','time_order',
        'delivery_time','total_money',
        'shiping_name','shiping_address',
        'shiping_phone','shiping_email',
        'shiping_note','shiping_date',
        'total_money','phuongthuc_thanhtoan',
        'phuongthuc_giaohang','status'
    ];
    public $timestamps = FALSE;
}
