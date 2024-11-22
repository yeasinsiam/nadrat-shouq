<?php

use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('product-categories', [ProductCategoryController::class, 'index']);



Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/',  'index');
    Route::get('/{productSlug}',  'show');
});


Route::get('contact-info', [ContactInfoController::class, 'index']);

Route::get('testimonials', [TestimonialController::class, 'index']);
