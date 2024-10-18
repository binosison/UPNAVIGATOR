<?php

use App\Http\Controllers\Api\PlaceApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/register', [AuthController::class, 'registerSave'])->name('api.register');
// Route::post('/login', [AuthController::class, 'loginAction'])->name('api.login');
// Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

Route::prefix('api')->group(function () {
    Route::get('/places', [PlaceApiController::class, 'index']);
    Route::post('/places', [PlaceApiController::class, 'store']);
    Route::get('/places/{id}', [PlaceApiController::class, 'show']);
    Route::put('/places/{id}', [PlaceApiController::class, 'update']);
    Route::delete('/places/{id}', [PlaceApiController::class, 'destroy']);
});