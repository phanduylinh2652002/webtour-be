<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\App\Http\Controllers\Auth\LoginController;
use Modules\Cms\App\Http\Controllers\Auth\RegisterController;
use Modules\Cms\App\Http\Controllers\CategoryController;
use Modules\Cms\App\Http\Controllers\CmsController;
use Modules\Cms\App\Http\Controllers\TourController;
use Modules\Cms\App\Http\Controllers\TourGuideController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('cms', CmsController::class)->names('cms');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('category', CategoryController::class)->names('category');
    Route::resource('tour', TourController::class)->names('tour');
    Route::resource('tourguide', TourGuideController::class)->names('tourguide');
    Route::resource('account', 'AccountController');
    Route::resource('role', 'RoleController');
    Route::resource('customer', 'CustomerController');
    Route::resource('news', 'NewsController');
    Route::get('bill', 'BillController@index');
    Route::get('billdetail/{id}', 'BillController@detail');
});
