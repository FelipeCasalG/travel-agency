<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cities\ViewCitiesController;

Route::view('/', 'dashboard');

Route::get('/cities', ViewCitiesController::class);