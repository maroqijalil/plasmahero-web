<?php

use App\Admin\Controllers\PendonoranController;
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

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::put('/products/{id}', [ProductController::class, 'update']);
// Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// CREATE
// Public routes
Route::get('/menu', [BaseController::class, 'availableMenu']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'my-profile'], function () {
        Route::get('', [ProfileController::class, 'index']);
        Route::post('', [ProfileController::class, 'store']);
        Route::put('/update-user', [ProfileController::class, 'updateUser']);
        Route::put('/update-detail', [ProfileController::class, 'updateDetail']);
        Route::delete('', [ProfileController::class, 'destroy']);
    });


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

    Route::get('/donor', [DonorController::class, 'index']);
    Route::get('/donor/{id}', [DonorController::class, 'show']);
    Route::post('/donor', [DonorController::class, 'store']);
    Route::put('/donor/{id}', [DonorController::class, 'update']);
    Route::delete('/donor/{id}', [DonorController::class, 'destroy']);

});

Route::get('/user', [RegisteredUserController::class, 'fetch']);
Route::get('/report', [ReportController::class, 'fetch']);
Route::get('/gallery', [GalleryController::class, 'fetch']);
Route::get('/pendonoran', [PendonoranController::class, 'fetch']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
