<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorType extends Model
{
    use HasFactory;

    protected $table = 'tutor_types';

    protected $fillable = [
        'name'
    ];
}
