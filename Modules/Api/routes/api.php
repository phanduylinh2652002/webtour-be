<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Api\App\Http\Controllers\AuthController;
use Modules\Api\App\Http\Controllers\CategoryController;
use Modules\Api\App\Http\Controllers\HomeController;

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
    Route::get('/limitTours', [HomeController::class, 'limitTours'])->name('limitTours');
    Route::get('/info', [HomeController::class, 'info'])->name('info');
    Route::get('/tourDomestic', [HomeController::class, 'tourDomestic'])->name('tourDomestic');
});
