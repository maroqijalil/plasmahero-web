<?php

use App\Common\Controllers\Auth\RegisteredUserController;
use App\Common\Controllers\DonorController;
use App\Common\Controllers\GalleryController;
use App\Admin\Controllers\PendonoranController;
use App\Common\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// CREATE

// READ
Route::get('user', [RegisteredUserController::class, 'fetch']);
Route::get('report', [ReportController::class, 'fetch']);
Route::get('donor', [DonorController::class, 'fetch']);
Route::get('gallery', [GalleryController::class, 'fetch']);
Route::get('pendonoran', [PendonoranController::class, 'fetch']);

// UPDATE

// DELETE


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
