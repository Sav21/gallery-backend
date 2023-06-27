<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleriesController;
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


Route::get('/gallery', [GalleriesController::class, 'index']);
Route::post('/galleries', [GalleriesController::class, 'store']);
// Route::get('/gallery/{id}', [GalleriesController::class, 'show']);
// Route::put('/gallery/{id}', [GalleriesController::class, 'update']);
// Route::delete('/gallery/{id}', [GalleriesController::class, 'destroy']);


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});