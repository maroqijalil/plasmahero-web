<?php

use App\Admin\Controllers\API\PendonoranController;
use App\Common\Controllers\API\AuthController;
use App\Common\Controllers\API\ProfileController;
use App\Common\Controllers\API\DonorController;
use App\Common\Controllers\GalleryController;
use App\Common\Controllers\ReportController;
use App\Controller\BaseController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/menu', [BaseController::class, 'availableMenu']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [RegisteredUserController::class, 'fetch']);

    Route::group(['prefix' => 'my-profile'], function () {
        Route::get('', [ProfileController::class, 'index']);
        Route::post('', [ProfileController::class, 'store']);
        Route::put('/update-user', [ProfileController::class, 'updateUser']);
        Route::put('/update-detail', [ProfileController::class, 'updateDetail']);
        Route::delete('', [ProfileController::class, 'destroy']);
    });

    Route::group(['prefix' => 'pendonoran'], function () {
        Route::get('', [PendonoranController::class, 'index']);
        Route::get('/show', [PendonoranController::class, 'show']);
        Route::post('', [PendonoranController::class, 'store']);
        Route::put('/{id}', [PendonoranController::class, 'update']);
        Route::delete('/{id}', [PendonoranController::class, 'destroy']);
    });

    Route::group(['prefix' => 'gallery'], function () {
        Route::post('', [GalleryController::class, 'create']);
        Route::get('', [GalleryController::class, 'fetch']);
        Route::put('/{id}', [GalleryController::class, 'update']);
        Route::delete('/{id}', [GalleryController::class, 'destroy']);
    });

    Route::group(['prefix' => 'report'], function () {
        Route::post('', [ReportController::class, 'create']);
        Route::get('', [ReportController::class, 'fetch']);
        Route::put('/{id}', [ReportController::class, 'update']);
        Route::delete('/{id}', [ReportController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'donor'], function () {
        Route::get('', [DonorController::class, 'index']);
        Route::get('/{id}', [DonorController::class, 'show']);
        Route::post('', [DonorController::class, 'store']);
        Route::put('/{id}', [DonorController::class, 'update']);
        Route::delete('/{id}', [DonorController::class, 'destroy']);
    });
});