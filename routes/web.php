<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ModellController;
use App\Http\Controllers\PostController;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'storeLogin'])->name('store-login');

Route::middleware('auth')->group(function() {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('product-types', ProductTypeController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('modells', ModellController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('colors', ColorController::class);


    //soft_delete
    Route::get('product-types-trash', [ProductTypeController::class, 'trash'])->name('product-types.trash');
    Route::get('product-types/{product_type}/recovery', [ProductTypeController::class, 'recovery'])->name('product-types.recovery');
    Route::get('product-types/{product_type}/forceDelete', [ProductTypeController::class, 'forceDelete'])->name('product-types.force-delete');

});

