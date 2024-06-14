<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::view('/', 'dashboard');

Route::get('/cities', [CityController::class, 'index']);