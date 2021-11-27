<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuocdichvu extends Model
{
    use HasFactory;
    protected $table = 'dichvu_dang';
    protected $fillable = ['id','nhiemvu_id','dichvu_id'];
    public $timestamps = FALSE;
}
