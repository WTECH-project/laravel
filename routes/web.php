<?php

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

Route::get('/', function () {
    return view('index.index');
});

Route::get('/settings', function() {
    return view('settings');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::get('/checkout', function() {
    return view('checkout.index');
});

Route::get('/categories', function () {
    return view('products.index');
});

Route::get('/product', function () {
    return view('products.show');
});

require __DIR__.'/auth.php';
