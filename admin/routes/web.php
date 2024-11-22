<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::redirect('/', '/dashboard');


Route::controller(AuthController::class)->as('auth.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', 'index')->name('login.index');
        Route::post('login', 'store')->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('logout', 'destroy')->name('login.destroy');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard',  [DashboardController::class, 'index'])->name('dashboard');

    // Products
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('product-categories', ProductCategoryController::class)->except('show');

    // Contact Info
    Route::prefix('contact-info')->as('contact-info.')->controller(ContactInfoController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update', 'update')->name('update');
    });

    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->except('show');
});
