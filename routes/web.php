<?php

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
