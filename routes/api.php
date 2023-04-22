<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->controller(AuthController::class)->group(
    function () {
        Route::post('/register', 'register')->name('customer.register');
        Route::post('/login', 'login')->name('customer.login');

        Route::middleware('auth:sanctum')->group(
            function () {
                Route::get('/user', 'user')->name('customer.user');
                Route::post('/logout', 'logout')->name('customer.logout');

                Route::controller(CustomerController::class)->group(function () {
                    Route::get('/profile', 'getProfileByCurrentUser')->name('customer.profile.get');
                    Route::post('/profile', 'update')->name('customer.profile.update');
                });

                Route::controller(VehicleController::class)->group(function () {
                    Route::get('/vehicles', 'index')->name('customer.vehicles.index');
                    Route::post('/vehicles', 'store')->name('customer.vehicles.store');
                    Route::get('/vehicles/{vehicle}', 'show')->name('customer.vehicles.show');
                    Route::put('/vehicles/{vehicle}', 'update')->name('customer.vehicles.update');
                    Route::delete('/vehicles/{vehicle}', 'destroy')->name('customer.vehicles.destroy');
                });

                Route::controller(AppointmentController::class)->group(function () {
                    Route::get('/appointments', 'index')->name('customer.appointments.index');
                    Route::post('/appointments', 'store')->name('customer.appointments.store');
                    Route::get('/appointments/{appointment}', 'show')->name('customer.appointments.show');
                    Route::put('/appointments/{appointment}', 'update')->name('customer.appointments.update');
                    Route::delete('/appointments/{appointment}', 'destroy')->name('customer.appointments.destroy');
                });
            }
        );
    }
);
