<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTutorType extends Model
{
    use HasFactory;

    protected $table = 'classes_tutor_types';

    protected $fillable = [
        'name'
    ];
}
