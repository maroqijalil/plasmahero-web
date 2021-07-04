<?php

use App\Admin\Controllers\Donation\PendonoranController;
use App\Admin\Controllers\Donation\PendonorController;
use App\Admin\Controllers\Donation\PenerimaController;
use App\Admin\Controllers\Donation\UnitDonorController;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\DasborController;
use App\Admin\Controllers\AccountController;
use App\Admin\Controllers\LaporanController;
use App\Admin\Controllers\ChatController as ChatCreateController;
use App\Admin\Controllers\Others\GaleriController as AdminGaleriController;
use App\User\Controllers\UserDetailController;
use App\Common\Controllers\ChatController;
use App\User\Controllers\HomeController;
use App\Common\Controllers\ReportController;
use App\Common\Controllers\ProfileController;
use App\Common\Controllers\DonorController;
use App\User\Controllers\Others\CeritaController;
use App\Admin\Controllers\Others\CeritaController as AdminCeritaController;
use App\Mail\MyTestEmail;


require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/chat', [ChatController::class, 'show'])->name('chat');
Route::get('/chat/{id}', [ChatController::class, 'index'])->name('chat');
Route::post('/chat', [ChatController::class, 'store'])->name('chat-store');
Route::view('/my-test-login', 'user.layouts.auth')->name('test-login');

Route::middleware('auth.role:pengguna')->group(function () {
	Route::get('/detail-pengguna', [UserDetailController::class, 'create'])->name('user-detail');
	Route::post('/detail-pengguna', [UserDetailController::class, 'store'])->name('user-detail.store');

	Route::get('/berita-acara', [ReportController::class, 'index']);
	Route::post('/berita-acara', [ReportController::class, 'store'])->name('fill-report.store');

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

Route::get('/tesmail', [DonorController::class, 'tesEmail']);

Route::group(['prefix' => '/admin', 'middleware' => 'auth.role:admin'], function () {
	Route::get('/', [DasborController::class, 'index'])->name('admin.dashboard');
	Route::get('/pendonoran', [PendonoranController::class, 'index'])->name('index-pendonoran');
	Route::post('/pendonoran', [PendonoranController::class, 'store'])->name('store-pencocokan');
	Route::get('/pendonoran/{id}', [ChatCreateController::class, 'create'])->name('chat-create');

	Route::get('/chat', [ChatController::class, 'index'])->name('chat-view-admin');

	Route::view('/konsultasi', 'admin.communication.consultation');
	Route::get('/akun', [AccountController::class, 'index'])->name('show-admin-akun');
	Route::post('/akun', [AccountController::class, 'store'])->name('store-admin-akun');
	Route::view('/pengaturan', 'admin.others.setting');

	Route::get('/pendonor', [PendonorController::class, 'index'])->name('index-pendonor');
	Route::get('/pendonor/{id}', [PendonorController::class, 'show'])->name('admin.donor.giver.show');
	Route::put('/pendonor/{id}', [PendonorController::class, 'update'])->name('admin.donor.giver.update');

	Route::get('/penerima', [PenerimaController::class, 'index'])->name('index-pemohon');
	Route::get('/penerima/{id}', [PenerimaController::class, 'show'])->name('admin.donor.recipient.show');
	Route::put('/penerima/{id}', [PenerimaController::class, 'update'])->name('admin.donor.recipient.update');

	Route::get('/unit-donor', [UnitDonorController::class, 'index'])->name('admin.donor.unit');
	Route::post('/unit-donor', [UnitDonorController::class, 'store'])->name('admin.donor.unit.store');
	Route::put('/unit-donor/{id}', [UnitDonorController::class, 'update'])->name('admin.donor.unit.update');
	Route::delete('/unit-donor/{id}', [UnitDonorController::class, 'destroy'])->name('admin.donor.unit.delete');

	Route::get('/berita-acara', [ReportController::class, 'show'])->name('berita-acara.show');

	Route::group(['prefix' => 'galeri'], function () {
		Route::get('/', [AdminGaleriController::class, 'index'])->name('galeri');
		Route::view('/tambah', 'admin.others.gallery.add');
		Route::get('/{id}/edit', [AdminGaleriController::class, 'edit']);
		Route::post('/', [AdminGaleriController::class, 'store']);
		Route::put('/{id}', [AdminGaleriController::class, 'update']);
		Route::delete('/{id}', [AdminGaleriController::class, 'destroy']);
	});

	Route::group(['prefix' => 'cerita'], function () {
		Route::get('/', [AdminCeritaController::class, 'index'])->name('galeri');
		Route::post('/{id}/terima', [AdminCeritaController::class, 'accept']);
		Route::post('/{id}/tolak', [AdminCeritaController::class, 'reject']);
		Route::get('/{id}/reset', [AdminCeritaController::class, 'reset']);
	});

	Route::get('/laporan', [LaporanController::class, 'index']);
	Route::get('/laporan-tanggal', [LaporanController::class, 'index2']);
});

Route::view('/akses-eror', 'common.layouts.error')->name('admin.error');

Route::get('/mail', function() {
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('iwandepee@gmail.com')->send(new MyTestEMail($details));

    dd("Email is Sent.");
});
