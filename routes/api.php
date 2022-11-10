<?php

use App\Http\Controllers\api\CommuneController;
use App\Http\Controllers\api\DistrictController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('districts', [DistrictController::class, 'index'])->name('api.districts.index');
Route::post('districts/{district}/communes', [CommuneController::class, 'districts_index'])->name('api.districts.communes.index');
