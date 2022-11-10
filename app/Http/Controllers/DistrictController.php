<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    function aptGet(Request $request)
    {
        if ($request->ajax()) {
            $districts = District::all();
            return response()->json($districts);
        }
    }
}
