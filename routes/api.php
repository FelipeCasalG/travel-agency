<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cities\StoreCityController;
use App\Http\Controllers\Cities\DestroyCityController;
use App\Http\Controllers\Cities\GetAllCitiesController;
use App\Http\Controllers\Cities\UpdateCityController;

use App\Http\Controllers\Airlines\GetAllAirlinesController;
use App\Http\Controllers\Airlines\StoreAirlineController;
use App\Http\Controllers\Airlines\DestroyAirlineController;
use App\Http\Controllers\Airlines\UpdateAirlineController;

Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', GetAllCitiesController::class)->name('index');
    Route::post('/', StoreCityController::class)->name('store');
    Route::put('/{id}', UpdateCityController::class)->name('update');
    Route::delete('/{id}', DestroyCityController::class)->name('destroy');
});

Route::prefix('airlines')->name('airlines.')->group(function () {
    Route::get('/', GetAllAirlinesController::class)->name('index');
    Route::post('/', StoreAirlineController::class)->name('store');
    Route::put('/{airline}', UpdateAirlineController::class)->name('update');
    Route::delete('/{airline}', DestroyAirlineController::class)->name('destroy');
});