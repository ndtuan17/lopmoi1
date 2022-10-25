<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    function showCommunesInDistrict(Request $request)
    {
        if ($request->ajax()) {
            $communes = Commune::where('district_id', $request->district_id)->select('id', 'name')->get();
            return response()->json($communes);
        }
    }
}
