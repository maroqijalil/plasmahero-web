<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReportController;
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
})->name('welcome');

Route::get('/berita-acara', [ReportController::class, 'index'])->name('berita-acara.index');
Route::post('/berita-acara', [ReportController::class, 'store'])->name('berita-acara.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {
    Route::view('/admin', 'layouts.admin.dashboard');
    Route::view('/admin/pendonor', 'layouts.admin.donor.donor-giver');
    Route::view('/admin/pemohon', 'layouts.admin.donor.donor-recipient');
    Route::view('/admin/pendonoran', 'layouts.admin.donor.donation');
    Route::view('/admin/chat', 'layouts.admin.communication.chat');
    Route::view('/admin/konsultasi', 'layouts.admin.communication.consultation');
    Route::view('/admin/akun', 'layouts.admin.others.account');
    Route::view('/admin/pengaturan', 'layouts.admin.others.setting');
    
});

Route::get('/galeri', [GalleryController::class, 'index']);
Route::get('/admin/galeri', [GalleryController::class, 'adminIndex']);
Route::post('/admin/galeri', [GalleryController::class, 'store']);