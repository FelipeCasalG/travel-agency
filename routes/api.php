<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/cities', [CityController::class, 'all']);
Route::post('/cities', [CityController::class, 'store']);
Route::patch('/cities/{id}', [CityController::class, 'update']);
Route::delete('/cities/{id}', [CityController::class, 'destroy']);