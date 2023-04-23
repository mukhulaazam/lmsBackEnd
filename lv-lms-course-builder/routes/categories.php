<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::controller(CategoryController::class)
    ->prefix('course/')
    ->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{id}', 'update');
        Route::delete('categories/{id}', 'destroy');
    });