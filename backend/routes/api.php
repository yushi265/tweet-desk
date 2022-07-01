<?php

use App\Http\Controllers\Auth\LoginController;
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
Route::get('/login', [LoginController::class, 'redirectToProvider'])->name('login');
Route::get('/login/callback', [LoginController::class, 'handleProviderCallback'])->name('callback');

Route::get('hello', function () {
    return response()->json(['hello']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});