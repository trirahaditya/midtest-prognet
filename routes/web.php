<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use GuzzleHttp\Promise\Create;

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

// Route::resource('/category', CategoriesController::class);
Route::get('/category', [CategoriesController::class, 'index']);
Route::view('/category/create', 'category.create');
Route::post('/proses-create-category', [CategoriesController::class, 'store'])->name('proses-create-category');
Route::get('/category/edit/{id}', [CategoriesController::class, 'edit']);
Route::post('/category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
Route::get('/category/{id}/delete',[CategoriesController::class,'destroy']);

// Route::resource('/product', ProductController::class);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/proses-create-product', [ProductController::class, 'store'])->name('proses-create-product');
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}/delete',[ProductController::class,'destroy']);

// Route::resource('/package', PackageController::class);
Route::get('/package', [PackageController::class, 'home']);
Route::get('/package/create',[PackageController::class,'create']);
Route::post('/proses-create-package', [PackageController::class, 'store'])->name('proses-create-package');
Route::get('/package/detail', [PackageController::class, 'show']);
Route::get('/package/edit/{id}', [PackageController::class, 'edit']);
Route::post('/package/update/{id}', [PackageController::class, 'update'])->name('package.update');
Route::get('/package/{id}/delete',[PackageController::class,'destroy']);
Route::get('/package/{id}/deleteproduct',[PackageController::class,'destroyProducts']);