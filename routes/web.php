<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\TutorController;
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

Route::controller(StaticController::class)->group(function () {
	Route::get('test', 'test');
	Route::get('test-danh-sach-lop', 'test_danh_sach_lop');

	Route::get('/', 'home');
	Route::get('lien-he-lopmoi', 'about');
});


Route::get('danh-sach-lop', [ClassController::class, 'index'])->name('classes.index');
Route::get('lop/{classId}', [ClassController::class, 'show'])->name('classes.show');
Route::get('danh-sach-trung-tam', [CenterController::class, 'index'])->name('centers.index');
Route::get('trung-tam/{center}', [CenterController::class, 'show'])->name('centers.show');

Route::prefix('bientap')->name('admin.')->group(function () {

	Route::prefix('centers')->controller(CenterController::class)->name('centers.')->group(function () {
		Route::get('create', 'admin_create')->name('create');
		Route::post('', 'admin_store')->name('store');
		Route::get('', 'admin_index')->name('index');
		Route::get('{center}', 'admin_show')->name('show');
		Route::get('{center}/edit', 'admin_edit')->name('edit');
		Route::put('{center}', 'admin_update')->name('update');
		Route::delete('{center}', 'admin_destroy')->name('destroy');

		Route::prefix('{center}/classes')->controller(ClassController::class)->name('classes.')->group(function () {
			Route::get('create', 'admin_centers_create')->name('create');
			Route::post('', 'admin_centers_store')->name('store');
			Route::get('', 'admin_centers_index')->name('index');
			Route::get('{idClass}', 'admin_centers_show')->name('show');
			Route::get('{idClass}/edit', 'admin_centers_edit')->name('edit');
			Route::put('{idClass}', 'admin_centers_update')->name('update');
			Route::delete('{idClass}', 'admin_centers_destroy')->name('destroy');
		});
	});

	Route::prefix('tutors')->controller(TutorController::class)->name('tutors.')->group(function () {
		Route::get('create', 'admin_create')->name('create');
		Route::post('', 'admin_store')->name('store');
		Route::get('', 'admin_index')->name('index');
		Route::get('{tutor}', 'admin_show')->name('show');
		Route::get('{tutor}/edit', 'admin_edit')->name('edit');
		Route::put('{tutor}', 'admin_update')->name('update');
		Route::delete('{tutor}', 'admin_destroy')->name('destroy');
	});
});
