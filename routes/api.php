<?php

use App\Admin\Controllers\API\AuthController;
use App\Common\Controllers\DonorController;
use App\Common\Controllers\GalleryController;
use App\Admin\Controllers\PendonoranController;
use App\Common\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Common\Controllers\Auth\RegisteredUserController;

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
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [RegisteredUserController::class, 'fetch']);
    Route::get('/donor', [DonorController::class, 'fetch']);
    Route::get('/pendonoran', [PendonoranController::class, 'fetch']);

    Route::post('/gallery', [GalleryController::class, 'create']);
    Route::get('/gallery', [GalleryController::class, 'fetch']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);

    Route::post('/report', [ReportController::class, 'create']);
    Route::get('/report', [ReportController::class, 'fetch']);
    Route::put('/report/{id}', [ReportController::class, 'update']);
    Route::delete('/report/{id}', [ReportController::class, 'destroy']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// READ


// UPDATE

// DELETE


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
