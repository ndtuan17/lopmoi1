<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CenterController;
use App\Http\Controllers\admin\centers\ClassController as CenterClassController;
use App\Http\Controllers\CommuneController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::prefix('bientap')->name('admin.')->group(function () {
	Route::resource('admins', AdminController::class);

	Route::resource('centers', CenterController::class)->except('show');

	Route::prefix('centers/{center}')->name('centers.')->group(function () {
		Route::resource('classes', CenterClassController::class)->except('edit', 'update');
	});
});

Route::post('showCommunesInDistrict', [CommuneController::class, 'showCommunesInDistrict']);
