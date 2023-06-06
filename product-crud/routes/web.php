<?php

use App\Http\Controllers\productcontroller;
use App\Models\product;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [productcontroller::class, 'index'])->name('products.index');
Route::get('/products/create', [productcontroller::class, 'create'])->name('products.create');
Route::post('/products/store', [productcontroller::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [productcontroller::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [productcontroller::class, 'update'])->name('update.edit');
Route::get('/products/{id}/delete', [productcontroller::class, 'destroy']);
Route::get('/products/{id}/show', [productcontroller::class, 'show']);
