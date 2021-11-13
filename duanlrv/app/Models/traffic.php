<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traffic extends Model
{
    use HasFactory;
    protected $table = 'traffic';
    protected $fillable = ['id','ip_address','date_traffic'];
    public $timestamps = FALSE;
}
