<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'email', 'password', 'name'
    ];
}
