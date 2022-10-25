<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'center_id', 'subject_id', 'grade_id', 'student_gender_id', 'student_level_id', 'student_level_detail', 'commune_id', 'address',
        'shift', 'salary', 'fee_percent', 'class_detail', 'tutor_type_id', 'tutor_gender_id', 'tutor_detail', 'source_link', 'code'
    ];

    function center()
    {
        return $this->belongsTo(Center::class);
    }

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    function student_gender()
    {
        return $this->belongsTo(StudentGender::class);
    }

    function student_level()
    {
        return $this->belongsTo(StudentLevel::class);
    }

    function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    function tutor_type()
    {
        return $this->belongsTo(TutorType::class);
    }

    function tutor_gender()
    {
        return $this->belongsTo(TutorGender::class);
    }
}
