<?php

use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\MapelRegencyController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ProgramRegencyController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RegencyController;
use App\Http\Controllers\Admin\MasterTeacherController;
use App\Http\Controllers\Admin\SubProgramController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::prefix('program')->controller(ProgramController::class)->name('program.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{programId}/edit', 'edit')->name('edit');
    Route::put('/{programId}/update', 'update')->name('update');
    Route::delete('/{programId}/delete', 'destroy')->name('destroy');
});

Route::prefix('sub-program')->controller(SubProgramController::class)->name('sub-program.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{subProgramId}/edit', 'edit')->name('edit');
    Route::put('/{subProgramId}/update', 'update')->name('update');
    Route::delete('/{subProgramId}/delete', 'destroy')->name('destroy');
});

Route::prefix('mapel')->controller(MapelController::class)->name('mapel.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{mapelId}/edit', 'edit')->name('edit');
    Route::put('/{mapelId}/update', 'update')->name('update');
    Route::delete('/{mapelId}/delete', 'destroy')->name('destroy');
});

Route::prefix('provinsi')->controller(ProvinceController::class)->name('province.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{provinceId}/edit', 'edit')->name('edit');
    Route::put('/{provinceId}/update', 'update')->name('update');
    Route::delete('/{provinceId}/delete', 'destroy')->name('destroy');
    Route::post('/import', 'importExcel')->name('importExcel');
});

Route::prefix('kab')->controller(RegencyController::class)->name('regency.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{regencyId}/edit', 'edit')->name('edit');
    Route::put('/{regencyId}/update', 'update')->name('update');
    Route::delete('/{regencyId}/delete', 'destroy')->name('destroy');
    Route::post('/import', 'importExcel')->name('importExcel');
});

Route::prefix('mapelperkota')->controller(MapelRegencyController::class)->name('mapel-regency.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{mapelId}/edit', 'edit')->name('edit');
    Route::put('/{mapelId}/update', 'update')->name('update');
    // Route::delete('/{regencyId}/delete', 'destroy')->name('destroy');
});

Route::prefix('programperkota')->controller(ProgramRegencyController::class)->name('program-regency.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    // Route::get('/{mapelId}/edit', 'edit')->name('edit');
    // Route::put('/{mapelId}/update', 'update')->name('update');
    // Route::delete('/{regencyId}/delete', 'destroy')->name('destroy');
});

Route::prefix('tutor')->controller(MasterTeacherController::class)->name('tutor.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{masterTeacherId}/edit', 'edit')->name('edit');
    Route::put('/{masterTeacherId}/update', 'update')->name('update');
    Route::delete('/{masterTeacherId}/delete', 'destroy')->name('destroy');
});

Route::prefix('page')->controller(LandingController::class)->name('page.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    // Route::get('/{masterTeacherId}/edit', 'edit')->name('edit');
    // Route::put('/{masterTeacherId}/update', 'update')->name('update');
    Route::delete('/{masterTeacherId}/delete', 'destroy')->name('destroy');
});
