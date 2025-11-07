<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('auth')->as('auth.')->group(function () {

    Route::controller(RegisterController::class)->as('register.')
        ->middleware('guest')
        ->prefix('register')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'post')->name('post');
        });

    Route::controller(LoginController::class)->as('login.')
        ->middleware('guest')
        ->prefix('login')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'post')->name('post');
        });

    Route::post('logout', [LogoutController::class, 'index'])
        ->middleware('auth')
        ->name('logout');
});
Route::prefix('account')->as('account.')->middleware('auth')->group(function () {
    Route::prefix('profile')->as('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'post')->name('post');
    });

    Route::get('orders', [OrderController::class, 'index'])->name('orders');
});
Route::prefix('products')->as('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('remove-filters', [ProductController::class, 'removeFilters'])->name('remove-filters');

    Route::get('{product}', [ProductController::class, 'show'])->name('show');
});

Route::prefix('cart')->as('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('add', [CartController::class, 'add'])->name('add');

});
