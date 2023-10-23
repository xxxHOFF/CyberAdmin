<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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
Route::view('/success', 'success')->middleware('auth')->name('success');
Route::view('/403', 'accessDenied')->name('403');

Route::get('/register', [RegisterController::class, 'create'])->middleware('auth')->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);
