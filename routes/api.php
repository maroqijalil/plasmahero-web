<?php

use App\Admin\Controllers\API\AuthController;
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
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{id}', [ProductController::class, 'update']);
    // Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


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
