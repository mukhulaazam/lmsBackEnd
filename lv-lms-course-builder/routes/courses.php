<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseBulderController;

Route::controller(CourseBulderController::class)
    ->prefix('courses/')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

