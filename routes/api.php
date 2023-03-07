<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->controller(AuthController::class)->group(function () {
    // unauthenticated routes only
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');

    // authenticated routes only
    Route::middleware('auth:sanctum')->group(function () {
        // user routes
        Route::get('/user', 'user')->name('user');
        Route::post('/logout', 'logout')->name('logout');
    });
});
