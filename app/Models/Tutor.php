<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $table = 'tutors';

    protected $fillable = [
        'name', 'birth_year', 'gender', 'description', 'status_id'
    ];

    function subjects()
    {
        return $this->belongsToMany(Subject::class, 'tutors_subjects', 'tutor_id', 'subject_id');
    }

    function districts()
    {
        return $this->belongsToMany(District::class, 'tutors_districts', 'tutor_id', 'district_id');
    }

    function status()
    {
        return $this->belongsTo(TutorStatus::class, 'status_id');
    }

    function scopeActive($query)
    {
        $query->join('tutors_states', 'tutors.status_id', '=', 'tutors_states.id')
            ->select('tutors.*')
            ->where('tutors_states.name', 'active');
    }

    function scopePending($query)
    {
        $query->join('tutors_states', 'tutors.status_id', '=', 'tutors_states.id')
            ->select('tutors.*')
            ->where('tutors_states.name', 'pending');
    }

    function scopeStatusId($query, $statusId)
    {
        $query->where('status_id', $statusId);
    }

    function scopeDistrictId($query, $district_id)
    {
        $query->join('tutors_districts', 'tutors.id', '=', 'tutors_districts.tutor_id')
            ->join('districts', 'tutors_districts.district_id', '=', 'districts.id')
            ->select('tutors.*')
            ->where('districts.id', $district_id);
    }

    function scopeSubjectId($query, $subject_id)
    {
        $query->join('tutors_subjects', 'tutors.id', '=', 'tutors_subjects.tutor_id')
            ->join('subjects', 'tutors_subjects.subject_id', '=', 'subjects.id')
            ->select('tutors.*')
            ->where('subjects.id', $subject_id);
    }

    function scopeGender($query, $gender)
    {
        $query->where('gender', $gender);
    }
}
