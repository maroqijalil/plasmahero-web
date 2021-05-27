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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('/admin', 'layouts.admin.dashboard');
Route::view('/admin/pendonor', 'layouts.admin.donor.donor-giver');
Route::view('/admin/pemohon', 'layouts.admin.donor.donor-recipient');
Route::view('/admin/pendonoran', 'layouts.admin.donor.donation');
Route::view('/admin/chat', 'layouts.admin.communication.chat');
Route::view('/admin/konsultasi', 'layouts.admin.communication.consultation');
Route::view('/admin/akun', 'layouts.admin.others.account');
Route::view('/admin/pengaturan', 'layouts.admin.others.setting');

require __DIR__.'/auth.php';
