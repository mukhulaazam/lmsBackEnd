<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeywordTagController;

Route::controller(KeywordTagController::class)
    ->prefix('tags/')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
