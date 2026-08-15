<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
Route::get('/about',[PageController::class,'about'])->name('pages.about');
Route::get('/contact',[PageController::class,'contact'])->name('pages.contact');
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('products', AdminProductController::class);
});
Route::post('/cart/add/{id}',[CartController::class,'add'])->name('cart.add');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::delete('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/increase/{id}',[CartController::class,'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}',[CartController::class,'decrease'])->name('cart.decrease');
