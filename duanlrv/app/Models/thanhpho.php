<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhpho extends Model
{
    use HasFactory;
    protected $table = 'city_province';
    protected $fillable = ['matp','name_thanhpho','type'];
    protected $primaryKey = 'matp';
    public $timestamps = FALSE;
}
