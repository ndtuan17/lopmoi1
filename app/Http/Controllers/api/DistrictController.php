<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {
            $districts = District::all();
            return response()->json($districts);
        }
    }
}
