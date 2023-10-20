<?php

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/users', function () {
    return view('BD\users');
})->name('users');

Route::get('/products', function () {
    return view('BD\products');
})->name('products');

Route::get('/booking', function () {
    return view('BD\booking');
})->name('booking');

Route::get('/sales', function () {
    return view('BD\sales');
})->name('sales');

Route::get('/status', function () {
    return view('status');
})->name('status');
