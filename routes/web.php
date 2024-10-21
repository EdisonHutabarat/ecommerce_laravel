<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\FlashsaleController;
// use App\Http\Controllers\ListController;

// Guest Route
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');

    Route::post('/post-login', [AuthController::class, 'login']);
})->middleware('guest');

// Admin Route
Route::group(['middleware' => 'admin'], function () {
    // Route::get('/admin', function () {
    //     return view('pages.admin.index');
    // })->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Product Route
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    // Product Detail
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

    // Product edit & update
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update'); 

    // Product delete
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete'); 


    // Route Distributor
    Route::get('/distributor', [DistributorController::class, 'index'])->name('admin.distributor');
    Route::get('/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('/distributor/store', [DistributorController::class, 'store'])->name('distributor.store');
    // Distributor edit & update
    Route::get('/distributor/edit/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::post('/distributor/update/{id}', [DistributorController::class, 'update'])->name('distributor.update'); 

    // Distributor delete
    Route::delete('/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete'); 

    // Flashsale route
    Route::get('/admin/flashsale', [FlashsaleController::class, 'index'])->name('admin.flashsale');
    Route::get('/flashsale/create', [FlashsaleController::class, 'create'])->name('flashsale.create');
    Route::post('/flashsale/store', [FlashsaleController::class, 'store'])->name('flashsale.store');
    Route::get('/flashsale/detail/{id}', [FlashsaleController::class,'detail'])->name('flashsale.detail');
    Route::get('/flashsale/edit/{id}', [FlashsaleController::class, 'edit'])->name('flashsale.edit');
    Route::post('/flashsale/update/{id}', [FlashsaleController::class,'update'])->name('flashsale.update');
    Route::delete('/flashsale/delete/{id}', [FlashsaleController::class,'delete'])->name('flashsale.delete');

    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');

})->middleware('admin');

// User Route
Route::group(['middleware' => 'web'], function () {
    // Route::get('/user', function () {
    //     return view('pages.user.index');
    // })->name('user.dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');

    // Product Route
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);
    Route::post('/product/purchase', [ProductController::class, 'purchaseProduct'])->name('purchase.product');


    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
})->middleware('web');



// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('beranda');
// });
// Route::get('/produk', function () {
//     return view('produk');
// });
// Route::get('/service', function () {
//     return view('service');
// });

// Route::get('/', [ListController::class,'index']);