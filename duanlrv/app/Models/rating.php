<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $fillable = ['account_id','product_id','rating_star',];
    protected $primaryKey = 'id';
    public $timestamps = FALSE;
}
