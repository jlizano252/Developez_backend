<?php

use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\API\RoleAPIController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

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

Route::middleware('auth:api')->group(function () {

    Route::resource('users', UserAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('roles', RoleAPIController::class)
        ->except(['create', 'edit']);
});
