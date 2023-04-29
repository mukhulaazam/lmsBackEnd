<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;

Route::controller(TagsController::class)
    ->prefix('tags/')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

