<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\MenuController;
/* use App\Http\Controllers\Api\ProductCategoryController as ProductCategoryControllerApi;
use App\Http\Controllers\Api\ProductController as ProductControllerApi;

Route::prefix('api')->group(function () {
    Route::apiResource(
        '/product-categories',
        ProductCategoryControllerApi::class
    )->only('index');

    Route::apiResource(
        '/products',
        ProductControllerApi::class
    )->only('index');
}); */

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('products', [HomepageController::class, 'products']);
Route::get('product/{slug}', [HomepageController::class, 'product']);
Route::get('categories',[HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('menu', MenuController::class);
});

Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::group(['middleware' => 'check_customer_login'], function () {
            Route::get('login', 'login')->name('customer.login');
            Route::post('login', 'store_login')->name('customer.store_login');
            Route::get('register', 'register')->name('customer.register');
            Route::post('register', 'store_register')->name('customer.store_register');
        });
        Route::post('logout', 'logout')->name('customer.logout');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
