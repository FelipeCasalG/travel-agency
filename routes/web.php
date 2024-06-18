<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ViewCitiesController;

Route::view('/', 'dashboard');

Route::get('/cities', [ViewCitiesController::class, 'execute']);