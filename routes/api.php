<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{product}', 'show')->name('show');
    Route::match(['put', 'patch'], '/{product}', 'update')->name('update');
    Route::delete('/{product}', 'destroy')->name('destroy');
});

Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{user}', 'show')->name('show');
    Route::match(['put', 'patch'], '/{user}', 'update')->name('update');
    Route::delete('/{user}', 'destroy')->name('destroy');
});

Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/{post}', 'show')->name('show');
    Route::match(['put', 'patch'], '/{post}', 'update')->name('update');
    Route::delete('/{post}', 'destroy')->name('destroy');
});
