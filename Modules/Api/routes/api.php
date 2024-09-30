<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Api\App\Http\Controllers\ApiPaymentController;
use Modules\Api\App\Http\Controllers\AuthController;
use Modules\Api\App\Http\Controllers\CategoryController;
use Modules\Api\App\Http\Controllers\HomeController;
use Modules\Api\App\Http\Controllers\NewsControllerControllerApi;
use Modules\Api\App\Http\Controllers\TourController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

//Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
//    Route::get('api', fn (Request $request) => $request->user())->name('api');
//});

Route::prefix('v1')->name('api.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:api');

    Route::get('/tour', [HomeController::class, 'index'])->name('home');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.detail');
    Route::get('/limitTours', [HomeController::class, 'limitTours'])->name('limitTours');
    Route::get('/info', [HomeController::class, 'info'])->name('info');
    Route::get('/tourDomestic', [HomeController::class, 'tourDomestic'])->name('tourDomestic');
    Route::get('/tourEu', [HomeController::class, 'tourEu'])->name('tourEu');
    Route::post('/bookTour', [TourController::class, 'bookTour'])->name('bookTour')->middleware('auth:api');

    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.detail');
    Route::get('/news', [NewsControllerControllerApi::class, 'index'])->name('news');
    Route::get('/news/{id}', [NewsControllerControllerApi::class, 'show'])->name('news.show');


    Route::get('/paid', [ApiPaymentController::class, 'paid'])->name('payment.paid')->middleware('auth:api');
    Route::get('/unpaid', [ApiPaymentController::class, 'unpaid'])->name('payment.unpaid')->middleware('auth:api');
});
