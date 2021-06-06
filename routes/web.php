<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DasborController;
use App\Http\Controllers\Admin\PendonoranController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\User\UserDetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;

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

Route::view('/', 'layouts.dashboard')->name('home');

Route::middleware('auth.role:pengguna')->group(function () {
    Route::get('/detail-pengguna', [UserDetailController::class, 'index'])->name('detail-pengguna');
    Route::patch('/detail-pengguna', [UserDetailController::class, 'update'])->name('fill-detail-giver.store');

    Route::get('/berita-acara', [ReportController::class, 'index']);
    Route::post('/berita-acara', [ReportController::class, 'store'])->name('fill-report.store');

    Route::get('/galeri', [GalleryController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::view('/carikan-plasma', 'layouts.user.donor.carikan-plasma')->name('carikan-plasma');
});

Route::middleware('auth.role:admin')->prefix('/admin')->group(function () {
    Route::view('', 'layouts.admin.dashboard');
    Route::get('/pendonoran', [PendonoranController::class, 'index']);
    Route::post('/pendonoran', [PendonoranController::class, 'store'])->name('store-pencocokan');
    Route::view('/chat', 'layouts.admin.communication.chat');
    Route::view('/konsultasi', 'layouts.admin.communication.consultation');
    Route::get('/akun', [AccountController::class, 'index'])->name('show-admin-akun');
    Route::post('/akun', [AccountController::class, 'store'])->name('store-admin-akun');
    Route::view('/pengaturan', 'layouts.admin.others.setting');

    Route::get('/pendonor', [DasborController::class, 'showPendonor']);
    Route::get('/pemohon', [DasborController::class, 'showPenerima']);

    Route::get('/galeri', [GalleryController::class, 'adminIndex']);
    Route::post('/galeri', [GalleryController::class, 'store']);

    Route::get('/berita-acara', [ReportController::class, 'show'])->name('berita-acara.show');
});

Route::view('errorpage', 'layouts.error')->name('errorpage');

Route::get('/send', function () {
    $email = '76akun@gmail.com';
    $data = array(
        'name' => 'Boi',
        'email_body' => 'Selamat Malam Sayang'
    );

    // Kirim Email
    Mail::send('email_template', $data, function ($mail) use ($email) {
        $mail->to($email, 'no-reply')
            ->subject("Sample Email Laravel");
        $mail->from('erikfaderik@gmail.com', 'Testing');
    });

    // Cek kegagalan
    if (Mail::failures()) {
        return "Gagal mengirim Email";
    }
    return "Email berhasil dikirim!";
});
