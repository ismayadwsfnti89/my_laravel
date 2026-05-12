<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/auth', [AdminController::class, 'adminAuth'])->name('admin.auth');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function (){

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('home.detail');




