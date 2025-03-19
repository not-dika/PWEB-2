<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/process-checkout', [CheckoutController::class, 'process'])->name('process_checkout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
