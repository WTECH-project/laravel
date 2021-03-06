<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Checkout\ShippingPaymentController;
use App\Http\Controllers\Checkout\DeliveryController;
use App\Http\Controllers\Checkout\SummaryController;
use App\Http\Controllers\Checkout\ThankyouController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/account', [SettingsController::class, 'index'])->name('settings');
Route::post('/account', [SettingsController::class, 'store']);

Route::get('/{sex_category}/products', [ProductController::class, 'index'])->name('products');
Route::get('/{sex_category}/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/checkout/cart', [CheckoutController::class, 'index'])->name('checkout.cart');
Route::post('/checkout/cart', [CheckoutController::class, 'store']);

Route::get('/checkout/shipping', [ShippingPaymentController::class, 'index'])->name('checkout.shipping');
Route::post('/checkout/shipping', [ShippingPaymentController::class, 'store']);

Route::get('/checkout/delivery', [DeliveryController::class, 'index'])->name('checkout.delivery');
Route::post('/checkout/delivery', [DeliveryController::class, 'store']);

Route::get('/checkout/summary', [SummaryController::class, 'index'])->name('checkout.summary');
Route::post('/checkout/summary', [SummaryController::class, 'store']);

Route::get('/checkout/thankyou', [ThankyouController::class, 'index'])->name('checkout.thankyou');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart', [CartController::class, 'destroy']);

Route::middleware(['auth', 'can:isAdmin,App\Model\Product'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/new', [AdminController::class, 'showCreate'])->name('admin.showCreate');
    Route::get('/admin/{product}', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('/admin/{product}', [AdminController::class, 'destroy'])->name('admin.delete');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/admin/{product}', [AdminController::class, 'update'])->name('admin.update');
});

require __DIR__.'/auth.php';
