<?php

namespace App\Http\Controllers\admin\centers;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Commune;
use App\Models\District;
use App\Models\Grade;
use App\Models\MClass;
use App\Models\StudentGender;
use App\Models\StudentLevel;
use App\Models\Subject;
use App\Models\TutorGender;
use App\Models\TutorType;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(Center $center)
    {
        $classes = $center->classes;
        return view('admin.centers.classes.index', compact('center', 'classes'));
    }
    public function create(Center $center)
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $student_genders = StudentGender::all();
        $student_levels = StudentLevel::all();
        $districts = District::all();
        $tutor_types = TutorType::all();
        $tutor_genders = TutorGender::all();
        return view('admin.centers.classes.create', compact(
            'center',
            'subjects',
            'grades',
            'student_genders',
            'student_levels',
            'districts',
            'tutor_types',
            'tutor_genders'
        ));
    }
    public function store(Request $request, Center $center)
    {
        $request->validate([
            'subject_id' => 'required|integer',
            'grade_id' => 'required|integer',
            'student_gender_id' => 'required|integer',
            'student_level_id' => 'required|integer',
            'commune_id' => 'required|integer',
            'shift' => 'required|integer',
            'salary' => 'required|integer',
            'fee_percent' => 'integer|nullable',
            'tutor_type_id' => 'required|integer',
            'tutor_gender_id' => 'required|integer',
            'source_link' => 'required',
        ]);
        $request->merge(['center_id' => $center->id]);
        $class = new MClass($request->all());
        $class->save();
        return redirect()->route('admin.centers.classes.index', $center)->with('message', 'create class successfully');
    }
    public function show(Center $center, MClass $class)
    {
        return view('admin.centers.classes.show', compact('center', 'class'));
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy(Center $center, MClass $class, Request $request)
    {
        // dd($request, $class);
        $class->delete();
        return redirect()->route('admin.centers.classes.index', $center)->with('message', 'delete class successfully');
    }
}
