<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardrController;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductsController::class)->names('products');
})->middleware(['auth', 'verified']);

Route::redirect('settings', 'settings/profile');

Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
Volt::route('settings/password', 'settings.password')->name('settings.password');
Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

require __DIR__.'/auth.php';
