<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['comment_id','comment','comment_name','comment_date','comment_product_id'];
    protected $primaryKey = 'comment_id';
}
