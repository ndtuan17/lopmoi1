<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorStatus extends Model
{
    use HasFactory;

    protected $table = 'tutors_states';

    protected $fillable = [
        'name'
    ];
}
