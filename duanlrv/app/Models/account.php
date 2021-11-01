<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


    class account extends Authenticatable
{   
    use HasFactory,Notifiable;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = ['id','name','email','phone','password','address','image','remember_token'];
    public $timestamps = FALSE;

}
