<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin/dasbor', 'layouts.admin.dashboard');
Route::view('/admin/pendonor', 'layouts.admin.donor.pendonor');
Route::view('/admin/pemohon', 'layouts.admin.donor.pemohon');
Route::view('/admin/pendonoran', 'layouts.admin.donor.pendonoran');
Route::view('/admin/chat', 'layouts.admin.komunikasi.chat');
Route::view('/admin/konsultasi', 'layouts.admin.komunikasi.konsultasi');
Route::view('/admin/akun', 'layouts.admin.lainnya.akun');
Route::view('/admin/pengaturan', 'layouts.admin.lainnya.pengaturan');
