<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorGender extends Model
{
    use HasFactory;

    protected $table = 'tutor_genders';

    protected $fillable = [
        'name'
    ];
}
