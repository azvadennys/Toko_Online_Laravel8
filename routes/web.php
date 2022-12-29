<?php

use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
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
    $data = [
        'category' => CategoryModel::all(),
    ];
    // dd($data['category']);
    return view('homepage', $data);
});

Auth::routes();

Route::get('/manage-product', [App\Http\Controllers\ProductController::class, 'manageproduct'])->name('manageproduct');
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'addproduct']);
Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'editproduct']);
Route::post('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'updateproduct']);
Route::post('/create-product', [App\Http\Controllers\ProductController::class, 'createproduct']);
Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteproduct']);
Route::get('/detail-product/{id}', [App\Http\Controllers\ProductController::class, 'detailproduct']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);

Route::get('/product-category/{id}', [App\Http\Controllers\ProductController::class, 'productcategory']);
Route::post('/search-product', [App\Http\Controllers\ProductController::class, 'searchproduct']);

Route::get('/history', [App\Http\Controllers\TransactionController::class, 'history']);
Route::get('/purchase', [App\Http\Controllers\CartController::class, 'purchase']);
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart']);
Route::get('/delete-cart/{id}', [App\Http\Controllers\CartController::class, 'deletecart']);
Route::post('/create-cart-product/{id}', [App\Http\Controllers\CartController::class, 'createcart']);
