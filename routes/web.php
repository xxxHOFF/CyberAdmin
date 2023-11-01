<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('index');
Route::get('/status', [StatusController::class, 'index'])->name('status');
Route::get('/get-status-timers', [StatusController::class, 'statusTimers']);

Route::post('/register', [RegisterController::class, 'store'])->middleware('ip.throttle:10,5')->middleware('guest')->name('register');

Route::post('/login', [LoginController::class, 'store'])->middleware('ip.throttle:10,5')->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('ip.throttle:10,5')->middleware('guest')->name('password.forgot');
Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest')->middleware('ip.throttle:10,5')->name('password.update');

Route::get('/user-info', [IndexController::class, 'userInfo'])->middleware('auth');

Route::get('/users', [UsersController::class, 'index'])->middleware('check.auth.level:1')->name('users');
Route::post('/users', [UsersController::class, 'store'])->middleware('check.auth.level:1')->name('users.store');
Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('check.auth.level:1')->name('users.update');
Route::get('/get-user-data/{user}', [UsersController::class, 'getUserData'])->middleware('check.auth.level:1');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware('check.auth.level:1')->name('users.destroy');

Route::get('/products', [ProductsController::class, 'index'])->middleware('check.auth.level:1')->name('products');
Route::post('/products', [ProductsController::class, 'store'])->middleware('check.auth.level:3')->name('products.store');
Route::put('/products/{product}', [ProductsController::class, 'update'])->middleware('check.auth.level:3')->name('products.update');
Route::get('/get-product-data/{product}', [ProductsController::class, 'getProductData'])->middleware('check.auth.level:1');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->middleware('check.auth.level:3')->name('products.destroy');

Route::get('/reservations', [ReservationsController::class, 'index'])->middleware('check.auth.level:1')->name('reservations');
Route::post('/reservations', [ReservationsController::class, 'store'])->middleware('check.auth.level:1')->name('reservations.store');
Route::put('/reservations/{reservation}', [ReservationsController::class, 'update'])->middleware('check.auth.level:1')->name('reservations.update');
Route::get('/get-reservation-data/{reservation}', [ReservationsController::class, 'getReservationData'])->middleware('check.auth.level:1');
Route::delete('/reservations/{reservation}', [ReservationsController::class, 'destroy'])->middleware('check.auth.level:1')->name('reservations.destroy');

Route::get('/sales', [SalesController::class, 'index'])->middleware('check.auth.level:1')->name('sales');
Route::post('/sales', [SalesController::class, 'store'])->middleware('check.auth.level:1')->name('sales.store');
Route::put('/sales/{sale}', [SalesController::class, 'update'])->middleware('check.auth.level:1')->name('sales.update');
Route::get('/get-sale-data/{sale}', [SalesController::class, 'getSaleData'])->middleware('check.auth.level:1');
Route::delete('/sales/{sale}', [SalesController::class, 'destroy'])->middleware('check.auth.level:1')->name('sales.destroy');

Route::get('/rents', [RentsController::class, 'index'])->middleware('check.auth.level:1')->name('rents');
Route::post('/rents', [RentsController::class, 'store'])->middleware('check.auth.level:1')->name('rents.store');
Route::put('/rents/{rent}', [RentsController::class, 'update'])->middleware('check.auth.level:1')->name('rents.update');
Route::get('/get-rent-data/{rent}', [RentsController::class, 'getRentData'])->middleware('check.auth.level:1');
Route::delete('/rents/{rent}', [RentsController::class, 'destroy'])->middleware('check.auth.level:1')->name('rents.destroy');
