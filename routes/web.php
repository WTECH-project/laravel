<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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

/*
Route::get('/', function () {
    return view('index.index');
})->name('home');
*/

Route::get('/', [ProductController::class, 'index_index'])->name('home');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/account', [SettingsController::class, 'index'])->name('settings');
Route::post('/account', [SettingsController::class, 'store']);

Route::get('/{sex_category}/products', [ProductController::class, 'index'])->name('products');
Route::get('/{sex_category}/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store']);

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart', [CartController::class, 'destroy']);

require __DIR__.'/auth.php';
