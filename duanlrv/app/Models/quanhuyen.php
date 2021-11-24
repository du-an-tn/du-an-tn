<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quanhuyen extends Model
{
    use HasFactory;
    protected $table = 'quan_huyen';
    protected $fillable = ['id','name_quanhuyen','type','matp'];
    public $timestamps = FALSE;

    public function thanhpho()
    {
       return $this->hasOne(thanhpho::class,'matp','matp');
    }
}
