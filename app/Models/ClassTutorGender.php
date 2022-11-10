<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTutorGender extends Model
{
    use HasFactory;

    protected $table = 'classes_tutor_genders';

    protected $fillable = [
        'name'
    ];
}
