<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

#users
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.view');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::post('/users/update/{user}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('users.update-user');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

#employees
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.view');
Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
Route::post('/employees/update/{employee}', [App\Http\Controllers\EmployeeController::class, 'updateEmployee'])->name('employees.update-employee');
Route::delete('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.delete');

#suppliers
Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.view');

#holidays
Route::get('/holidays', [App\Http\Controllers\HolidayController::class, 'index'])->name('holiday.view');

#items
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items.view');

#appointments
Route::get('/admin-appointments', [App\Http\Controllers\AppointmentController::class, 'view'])->name('appointments.view');

#customers
Route::get('/admin-customers', [App\Http\Controllers\CustomerController::class, 'view'])->name('customers.view');

#vehicles
Route::get('/admin-vehicles', [App\Http\Controllers\VehicleController::class, 'view'])->name('vehicles.view');

#Payments
Route::get('/payments', function () {
    return view('payments.index');
});

#Complaints
Route::get('/complaints', function () {
    return view('complaints.index');
});

#Jobs
Route::get('/jobs', function () {
    return view('jobs.index');
});

#goods receivings
Route::get('/goods-receivings', function () {
    return view('goods-receivings.index');
});

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
