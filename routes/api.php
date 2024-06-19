<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreateCityController;
use App\Http\Controllers\DestroyCityController;
use App\Http\Controllers\GetAllCitiesController;
use App\Http\Controllers\UpdateCityController;

use App\Http\Controllers\Airlines\GetAllAirlinesController;
use App\Http\Controllers\Airlines\StoreAirlineController;
use App\Http\Controllers\Airlines\DestroyAirlineController;
use App\Http\Controllers\Airlines\UpdateAirlineController;

Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', GetAllCitiesController::class)->name('index');
    Route::post('/', CreateCityController::class)->name('store');
    Route::patch('/{id}', UpdateCityController::class)->name('update');
    Route::delete('/{id}', DestroyCityController::class)->name('destroy');
});

Route::prefix('airlines')->name('airlines.')->group(function () {
    Route::get('/', GetAllAirlinesController::class)->name('index');
    Route::post('/', StoreAirlineController::class)->name('store');
    Route::patch('/{id}', UpdateAirlineController::class)->name('update');
    Route::delete('/{id}', DestroyAirlineController::class)->name('destroy');
});