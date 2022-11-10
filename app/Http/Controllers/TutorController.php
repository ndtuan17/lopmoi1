<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Subject;
use App\Models\Tutor;
use App\Models\TutorProfileStatus;
use App\Models\TutorStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{

    function admin_create()
    {
        $subjects = Subject::all();
        $districts = District::all();
        return view('admin.tutors.create', compact('subjects', 'districts', 'tutor_profile_states'));
    } //done

    function admin_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_year' => 'required|integer',
            'gender' => 'required',
            'description' => 'required',
            'subject_ids' => 'required',
            'district_ids' => 'required',

        ]);

        $subjects_can_teach = Subject::findMany($request->subject_ids);
        $districts_can_teach = District::findMany($request->district_ids);

        $tutor = new Tutor($request->all());
        $tutor->save();
        $tutor->subjects()->saveMany($subjects_can_teach);
        $tutor->districts()->saveMany($districts_can_teach);
        return redirect()->route('admin.tutors.index')->with('message', 'create tutor successfully');
    } //done

    function admin_index(Request $request)
    {
        $states = TutorStatus::all();
        $districts = District::all();
        $subjects = Subject::all();

        $tutorQuery = Tutor::query();
        if (!empty($request->status_id)) {
            $tutorQuery = $tutorQuery->statusId($request->status_id);
        }

        if (!empty($request->district_id)) {
            $tutorQuery = $tutorQuery->districtId($request->district_id);
        }

        if (!empty($request->subject_id)) {
            $tutorQuery = $tutorQuery->subjectId($request->subject_id);
        }

        if (!empty($request->gender)) {
            $tutorQuery = $tutorQuery->gender($request->gender);
        }

        $tutors = $tutorQuery->get();
        return view('admin.tutors.index', compact('tutors', 'states', 'districts', 'subjects'));
    } //done

    function admin_show()
    {
    } //ommit

    function admin_edit(Tutor $tutor)
    {
        $subjects = Subject::all();
        $districts = District::all();
        $states = TutorStatus::all();
        return view('admin.tutors.edit', compact('tutor', 'subjects', 'districts', 'states'));
    } //done

    function admin_update(Tutor $tutor, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_year' => 'required|integer',
            'gender' => 'required',
            'description' => 'required',
        ]);

        $tutor->update($request->all());

        if (!empty($request->district_ids)) {
            $districts_can_teach = District::findMany($request->district_ids);
            $tutor->districts()->detach();
            $tutor->districts()->saveMany($districts_can_teach);
        }

        if (!empty($request->subject_ids)) {
            $subjects_can_teach = Subject::findMany($request->subject_ids);
            $tutor->subjects()->detach();
            $tutor->subjects()->saveMany($subjects_can_teach);
        }

        return redirect()->route('admin.tutors.index')->with('message', 'update tutor successfully');
    } //done

    function admin_destroy(Tutor $tutor)
    {
        $tutor->delete();
        return redirect()->route('admin.tutors.index')->with('message', 'delete tutor successfully');
    } //done
}
