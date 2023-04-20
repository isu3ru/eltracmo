<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->controller(AuthController::class)->group(
    function () {
        Route::post('/register', 'register')->name('customer.register');
        Route::post('/login', 'login')->name('customer.login');

        Route::middleware('auth:sanctum')->group(
            function () {
                Route::get('/user', 'user')->name('customer.user');
                Route::post('/logout', 'logout')->name('customer.logout');

                Route::controller(CustomerController::class)->group(
                    callback: function () {
                        Route::get('/profile', 'getProfileByCurrentUser')->name('customer.profile.get');
                        Route::post('/profile', 'update')->name('customer.profile.update');
                    }
                );

                Route::controller(VehicleController::class)->group(callback: function () {
                    Route::get('/vehicles', 'index')->name('customer.vehicles.index');
                    Route::post('/vehicles', 'store')->name('customer.vehicles.store');
                    Route::get('/vehicles/{vehicle}', 'show')->name('customer.vehicles.show');
                    Route::put('/vehicles/{vehicle}', 'update')->name('customer.vehicles.update');
                    Route::delete('/vehicles/{vehicle}', 'destroy')->name('customer.vehicles.destroy');
                });
            }
        );
    }
);
