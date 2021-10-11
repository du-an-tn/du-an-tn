<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typepost extends Model
{
    use HasFactory;
    protected $table = 'type_post';
    protected $fillable = ['id','name_type','slug','hidden'];
    public $timestamps = FALSE;

    public function infotype()
    {
       return $this->hasMany(infomation::class,'id_nav','id');
    }

}
