<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateCityController;
use App\Http\Controllers\DestroyCityController;
use App\Http\Controllers\GetAllCitiesController;
use App\Http\Controllers\UpdateCityController;

Route::get('/cities', GetAllCitiesController::class);
Route::post('/cities', CreateCityController::class);
Route::patch('/cities/{id}', UpdateCityController::class);
Route::delete('/cities/{id}', DestroyCityController::class);