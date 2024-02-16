<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginData extends Model
{
    use HasFactory;
    protected $table = 'user_login_data';
    
    protected $fillable = [
        'user_id',
        'ip',
        'ip_location',
        'login_at',
        'user_agent',
    ];
    protected $dates = ['login_at', 'created_at', 'updated_at'];

   
}