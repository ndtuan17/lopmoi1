<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\District;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    function districts_index(District $district, Request $request)
    {
        if ($request->ajax()) {
            $communes = $district->communes;
            return response()->json($communes);
        }
    }
}
