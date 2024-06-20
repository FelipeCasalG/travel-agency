<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cities\StoreCityController;
use App\Http\Controllers\Cities\DestroyCityController;
use App\Http\Controllers\Cities\GetAllCitiesController;
use App\Http\Controllers\Cities\UpdateCityController;

Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', GetAllCitiesController::class)->name('index');
    Route::post('/', StoreCityController::class)->name('store');
    Route::patch('/{id}', UpdateCityController::class)->name('update');
    Route::delete('/{id}', DestroyCityController::class)->name('destroy');
});