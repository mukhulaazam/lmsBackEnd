<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseBulderController;

Route::controller(CourseBulderController::class)
    ->prefix('course/')
    ->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{id}', 'update');
        Route::delete('categories/{id}', 'destroy');
    });