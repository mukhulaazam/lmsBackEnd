<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;

Route::controller(SubCategoryController::class)
    ->prefix('course/')
    ->group(function () {
        Route::get('sub-categories', 'index');
        Route::post('sub-categories', 'store');
        Route::get('sub-categories/{id}', 'show');
        Route::put('sub-categories/{id}', 'update');
        Route::delete('sub-categories/{id}', 'destroy');
    });