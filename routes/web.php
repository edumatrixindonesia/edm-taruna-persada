<?php

use App\Http\Controllers\Admin\AccuracyProgramController;
use App\Http\Controllers\Admin\BestProgramController;
use App\Http\Controllers\Admin\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RegencyController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\SubProgramController;
use App\Http\Controllers\Admin\MapelRegencyController;
use App\Http\Controllers\Admin\MasterTeacherController;
use App\Http\Controllers\Admin\MediaMassaController;
use App\Http\Controllers\Admin\ProgramRegencyController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\SubProgramRegencyController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SubPageController;
use App\Http\Controllers\TestimonialController;

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

Route::get('/', [HomepageController::class, 'index']);
Route::get('/program/{program}', [SubPageController::class, 'program']);
Route::get('/wilayah/{wilayah}', [SubPageController::class, 'wilayah']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::prefix('admin')->group(function () {
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

    Route::prefix('kec')->controller(DistrictController::class)->name('district.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{districtId}/edit', 'edit')->name('edit');
        Route::put('/{districtId}/update', 'update')->name('update');
        Route::delete('/{districtId}/delete', 'destroy')->name('destroy');
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

    Route::prefix('subprogramperkota')->controller(SubProgramRegencyController::class)->name('sub-program-regency.')->group(function () {
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
        Route::get('/{landingId}/edit', 'edit')->name('edit');
        Route::put('/{landingId}/update', 'update')->name('update');
        Route::delete('/{landingId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('best-program')->controller(BestProgramController::class)->name('best-program.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{bestProgramId}/edit', 'edit')->name('edit');
        Route::put('/{bestProgramId}/update', 'update')->name('update');
        Route::delete('/{bestProgramId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('best-program/akurasi')->controller(AccuracyProgramController::class)->name('akurasi.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{accuracyProgramId}/edit', 'edit')->name('edit');
        Route::put('/{accuracyProgramId}/update', 'update')->name('update');
        Route::delete('/{accuracyProgramId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('media-massa')->controller(MediaMassaController::class)->name('media-massa.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        // Route::get('/{testimonialId}/edit', 'edit')->name('edit');
        // Route::put('/{testimonialId}/update', 'update')->name('update');
        Route::delete('/{mediaMassaId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('gallery')->controller(GalleryController::class)->name('gallery.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        // Route::get('/{testimonialId}/edit', 'edit')->name('edit');
        // Route::put('/{testimonialId}/update', 'update')->name('update');
        Route::delete('/{galleryId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('testimonial')->controller(TestimonialController::class)->name('testimonial.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{testimonialId}/edit', 'edit')->name('edit');
        Route::put('/{testimonialId}/update', 'update')->name('update');
        Route::delete('/{testimonialId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('promo')->controller(PromoController::class)->name('promo.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{promoId}/edit', 'edit')->name('edit');
        Route::put('/{promoId}/update', 'update')->name('update');
        Route::delete('/{promoId}/delete', 'destroy')->name('destroy');
    });

    Route::prefix('faq')->controller(FAQController::class)->name('faq.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{faqId}/edit', 'edit')->name('edit');
        Route::put('/{faqId}/update', 'update')->name('update');
        Route::delete('/{faqId}/delete', 'destroy')->name('destroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
