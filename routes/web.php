<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardrController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use Livewire\Volt\Volt;

// Halaman utama
Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('product', [HomepageController::class, 'product'])->name('product');

// Halaman dashboard admin (middleware auth dan verified)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route untuk fitur customer (login, register, logout)
Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::get('login', 'login')->name('customer.login'); // form login
        Route::post('login', 'store_login')->name('customer.store_login'); // aksi login
        Route::get('register', 'register')->name('customer.register'); // form register
        Route::post('register', 'store_register')->name('customer.store_register'); // aksi register
        Route::post('logout', 'logout')->name('customer.logout'); // aksi logout
    });

    // ✅ Tambahan: route ke dashboard customer setelah login sukses
    Route::middleware('auth:customer')->group(function () {
        Route::get('dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    });
});

// Route untuk dashboard admin
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductsController::class)->names('products');
});

// Redirect halaman settings
Route::redirect('settings', 'settings/profile');

// Halaman settings menggunakan Livewire Volt
Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
Volt::route('settings/password', 'settings.password')->name('settings.password');
Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

// Auth bawaan Laravel
require __DIR__ . '/auth.php';
