<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CourseBulderController, CourseLectureController};

Route::controller(CourseBulderController::class)
    ->prefix('courses/')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

Route::controller(CourseLectureController::class)
    ->prefix('course/')
    ->group(function () {
        Route::get('lectures', 'index');
        Route::post('lectures', 'store');
        Route::get('lectures/{id}', 'show');
        Route::put('lectures/{id}', 'update');
        Route::delete('lectures/{id}', 'destroy');
    });
