<?php

use App\Common\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\DasborController;
use App\Admin\Controllers\PendonoranController;
use App\Admin\Controllers\AccountController;
use App\Admin\Controllers\ChatController as ChatCreateController;
use App\Common\Controllers\ChatController;
use App\User\Controllers\UserDetailController;
use App\Common\Controllers\ReportController;
use App\Common\Controllers\ProfileController;
use App\Common\Controllers\DonorController;
use App\User\Controllers\Others\CeritaController;
use App\Admin\Controllers\Others\CeritaController as AdminCeritaController;

use App\Admin\Controllers\Others\GaleriController as AdminGaleriController;

require __DIR__ . '/auth.php';

Route::view('/', 'user.home')->name('home');


Route::get('/chat', [ChatController::class, 'show'])->name('chat');
Route::get('/chat/{id}', [ChatController::class, 'index'])->name('chat');
Route::post('/chat', [ChatController::class, 'store'])->name('chat-store');
Route::view('/my-test-login', 'user.layouts.auth')->name('test-login');

Route::middleware('auth.role:pengguna')->group(function () {
    Route::get('/detail-pengguna', [UserDetailController::class, 'index'])->name('detail-pengguna');
    Route::patch('/detail-pengguna', [UserDetailController::class, 'update'])->name('fill-detail-giver.store');

    Route::get('/berita-acara', [ReportController::class, 'index']);
    Route::post('/berita-acara', [ReportController::class, 'store'])->name('fill-report.store');

    Route::get('/galeri', [GalleryController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/carikan-plasma', [DonorController::class, 'carikanidx'])->name('carikan-plasma');
    Route::patch('/carikan-plasma', [DonorController::class, 'carikan'])->name('carikan.store');

    Route::view('/donorkan-plasma', 'user.donor.donorkan-plasma')->name('donorkan-plasma');


    Route::get('/pendonoran', [DonorController::class, 'index']);
    Route::post('/pendonoran', [DonorController::class, 'store']);

    Route::view('/buat-cerita', 'user.others.create-cerita');
    Route::post('/cerita', [CeritaController::class, 'store']);
});

//Route::middleware('auth.role:admin')->prefix('/admin')->group(function () {
Route::group(['prefix' => '/admin', 'middleware' => 'auth.role:admin'], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/pendonoran', [PendonoranController::class, 'index'])->name('index-pendonoran');
    Route::post('/pendonoran', [PendonoranController::class, 'store'])->name('store-pencocokan');
    Route::get('/pendonoran/{id}', [ChatCreateController::class, 'create'])->name('chat-create');

    Route::get('/chat', [ChatController::class, 'index'])->name('chat-view-admin');

    Route::view('/konsultasi', 'admin.communication.consultation');
    Route::get('/akun', [AccountController::class, 'index'])->name('show-admin-akun');
    Route::post('/akun', [AccountController::class, 'store'])->name('store-admin-akun');
    Route::view('/pengaturan', 'admin.others.setting');

    Route::get('/pendonor', [DasborController::class, 'showPendonor'])->name('index-pendonor');
    Route::get('/pemohon', [DasborController::class, 'showPenerima'])->name('index-pemohon');

    Route::get('/berita-acara', [ReportController::class, 'show'])->name('berita-acara.show');

    Route::group(['prefix'=>'galeri'], function() {
        Route::get('/', [AdminGaleriController::class, 'index'])->name('galeri');
        Route::view('/tambah', 'admin.others.gallery.add');
        Route::get('/{id}/edit', [AdminGaleriController::class, 'edit']);
        Route::post('/', [AdminGaleriController::class, 'store']);
        Route::put('/{id}', [AdminGaleriController::class, 'update']);
        Route::delete('/{id}', [AdminGaleriController::class, 'destroy']);
    });

    Route::group(['prefix' => 'cerita'], function () {
        Route::get('/', [AdminCeritaController::class, 'index']);
        Route::post('/{id}/terima', [AdminCeritaController::class, 'accept']);
        Route::post('/{id}/tolak', [AdminCeritaController::class, 'reject']);
        Route::get('/{id}/reset', [AdminCeritaController::class, 'reset']);
    });
});

Route::view('/akses-eror', 'common.layouts.error')->name('admin.error');
