<?php

use App\Http\Controllers\AuthController;
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
Route::middleware('api')
    ->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('/login', [AuthController::class,'login'])->name('login');
            Route::middleware('auth:api')->group(function () {
                Route::post('/logout', [AuthController::class,'logout'])->name('logout');
                Route::post('/refresh', [AuthController::class,'refresh'])->name('refresh');
                Route::post('/me', [AuthController::class,'me'])->name('me');
            });
        });

        Route::middleware('auth:api')->group(function () {
            Route::get('/hello', function () {
                return response()->json(['hello']);
            });
        });
});