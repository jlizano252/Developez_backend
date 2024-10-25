<?php

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

Route::post('/login', [LoginController::class, 'login']);
Route::post('oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware('throttle');

Route::middleware('auth:api')->group(function () {

    Route::resource('users', UserAPIController::class)
        ->except(['create', 'edit']);
});