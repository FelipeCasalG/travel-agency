<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateCityController;
use App\Http\Controllers\DestroyCityController;
use App\Http\Controllers\GetAllCitiesController;
use App\Http\Controllers\UpdateCityController;

Route::get('/cities', [GetAllCitiesController::class, 'execute']);
Route::post('/cities', [CreateCityController::class, 'execute']);
Route::patch('/cities/{id}', [UpdateCityController::class, 'execute']);
Route::delete('/cities/{id}', [DestroyCityController::class, 'execute']);