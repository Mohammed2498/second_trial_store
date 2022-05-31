<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|;;
*/

Route::get('/front', function () {
    return view('layout.front');
});
Route::get('/test', function () {
    return view('products.product');
});

Route::get("/post/1", function () {
    return "Post 1";
});
Route::group([
    'prefix' => 'dashboard',
    'as' => 'categories.'
], function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('create');
    Route::post('categories/create', [CategoryController::class, 'store'])->name('store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});
//--------------------------//
Route::group([
    'prefix'=>'dashboard',
],function(){
    Route::resource('products',ProductController::class);
});

// Route::get('products', [ProductController::class, 'index']);
// Route::get('products/create', [ProductController::class, 'create']);
// Route::post('products/create', [ProductController::class, 'store']);
// Route::get('products/{id}/edit', [ProductController::class, 'edit']);
// Route::put('products/{id}', [ProductController::class, 'update']);
// Route::delete('products/{id}', [ProductController::class, 'destroy']);
//Route::get('products/index',[ProductController::class,'index']);
//Route::get('/products',[ProductController::class,'Products']);
//Route::get('/items/{id}/{details?}',[ItemController::class,'displayData']);
