<?php

use App\Http\Controllers\Auth\RegisteredUserController;
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
})->name('home');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/settings', function() {
    return view('settings');
})->name('settings');

Route::get('/checkout', function() {
    return view('checkout.index');
})->name('checkout');

Route::get('/categories', function () {
    return view('products.index');
})->name('categories');

Route::get('/product', function () {
    return view('products.show');
})->name('product');

require __DIR__.'/auth.php';
