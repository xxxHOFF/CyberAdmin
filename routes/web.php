<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
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

Route::post('/register', [RegisterController::class, 'store'])->middleware('ip.throttle:10,5')->middleware('guest')->name('register');

Route::post('/login', [LoginController::class, 'store'])->middleware('ip.throttle:10,5')->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('ip.throttle:10,5')->middleware('guest')->name('password.forgot');
Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest')->middleware('ip.throttle:10,5')->name('password.update');

Route::get('/user-info', [IndexController::class, 'userInfo'])->middleware('auth');

Route::get('/users', [UsersController::class, 'index'])->middleware('check.auth.level:1')->name('users');
Route::post('/users', [UsersController::class, 'store'])->middleware('check.auth.level:2')->name('users.store');
Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('check.auth.level:2')->middleware('check.permits')->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware('check.auth.level:2')->middleware('check.permits')->name('users.destroy');
