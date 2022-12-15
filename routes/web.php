<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ModellController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SupplierController;
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
    return view('welcome');
});

// Route::get('/colors', function () {
//     return view('color.create');
// });

Route::resource('colors', ColorController::class);
Route::resource('product-types', ProductTypeController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('brands', BrandController::class);
Route::resource('modells', ModellController::class);

//soft_delete
Route::get('product-types-trash', [ProductTypeController::class, 'trash'])->name('product-types.trash');
Route::get('product-types/{product_type}/recovery', [ProductTypeController::class, 'recovery'])->name('product-types.recovery');
Route::get('product-types/{product_type}/forceDelete', [ProductTypeController::class, 'forceDelete'])->name('product-types.force-delete');
