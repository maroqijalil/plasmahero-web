<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorGiverController;
use App\Http\Controllers\ReportController;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('landing');
});

Route::get('/dasbor', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dasbor');

Route::middleware('auth.role:admin')->group(function () {
    Route::view('/admin', 'layouts.admin.dashboard');
    Route::view('/admin/pendonor', 'layouts.admin.donor.donor-giver');
    Route::view('/admin/pemohon', 'layouts.admin.donor.donor-recipient');
    Route::view('/admin/pendonoran', 'layouts.admin.donor.donation');
    Route::view('/admin/chat', 'layouts.admin.communication.chat');
    Route::view('/admin/konsultasi', 'layouts.admin.communication.consultation');
    Route::view('/admin/akun', 'layouts.admin.others.account');
    Route::view('/admin/pengaturan', 'layouts.admin.others.setting');

    Route::get('/admin/galeri', [GalleryController::class, 'adminIndex']);
    Route::post('/admin/galeri', [GalleryController::class, 'store']);
});

Route::get('/isi-detail-pendonor', [DonorGiverController::class, 'index'])->name('fill-detail-giver.index');
Route::post('/isi-detail-pendonor', [DonorGiverController::class, 'store'])->name('fill-detail-giver.store');

Route::get('/berita-acara', [ReportController::class, 'index'])->name('berita-acara.index');
Route::post('/berita-acara', [ReportController::class, 'store'])->name('berita-acara.store');
