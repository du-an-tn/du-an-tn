<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datlich extends Model
{
    use HasFactory;
    protected $table = 'dat_lich';
    protected $fillable = ['id','id_coso','id_nhucau','set_time','id_status'];
    public $timestamps = FALSE;
}
