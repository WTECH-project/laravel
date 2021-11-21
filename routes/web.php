<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
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

Route::get('/account', [SettingsController::class, 'index'])->name('settings');
Route::post('/account', [SettingsController::class, 'store']);

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/checkout', function() {
    return view('checkout.index');
})->name('checkout');

Route::get('/product', function () {
    return view('products.show');
})->name('product');

require __DIR__.'/auth.php';
