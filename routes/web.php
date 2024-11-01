<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {return view('welcome');});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes(); // Это должно автоматически добавить маршруты для Voyager
    Route::group(['prefix' => 'custom'], function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    });
});
