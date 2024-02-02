<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
// Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
// Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
// Route::get('/product/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
// Route::put('/product/{product}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

Route::resource('product', ProductController::class)->except([
    'show'
]);