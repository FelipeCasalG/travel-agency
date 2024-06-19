<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateCityController;
use App\Http\Controllers\DestroyCityController;
use App\Http\Controllers\GetAllCitiesController;
use App\Http\Controllers\UpdateCityController;

Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', GetAllCitiesController::class)->name('index');
    Route::post('/', CreateCityController::class)->name('store');
    Route::put('/{id}', UpdateCityController::class)->name('update');
    Route::delete('/{id}', DestroyCityController::class)->name('destroy');
});