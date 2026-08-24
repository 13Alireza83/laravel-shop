<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout.index')->middleware('auth');

Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/reviews',[ReviewController::class,'index'])->name('admin.reviews.index');
    Route::post('/reviews/{id}/approve',[ReviewController::class,'approve'])->name('admin.reviews.approve');
    Route::delete('/reviews/{id}',[ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/payment/process',[PaymentController::class, 'process'])->name('payment.process')->middleware('auth');
Route::get('/payment/request', [PaymentController::class, 'request'])->name('payment.request')->middleware('auth');
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/my-orders',[UserOrderController::class,'index'])->name('user.orders')->middleware('auth');
Route::post('/reviews/{productId}',[\App\Http\Controllers\ReviewController::class,'store'])->name('reviews.store')->middleware('auth');
Route::post('/cart/apply-coupon',[CartController::class,'applyCoupon'])->name('cart.applyCoupon')->middleware('auth');
Route::get('/cart/remove-coupon',[CartController::class,'removeCoupon'])->name('cart.removeCoupon')->middleware('auth');
Route::get('/admin',[DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

require __DIR__.'/auth.php';
