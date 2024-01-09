<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

// Home page route (this might already exist)
Route::get('/', function () {
    return view('welcome');
});

// Car routes
Route::get('/cars', [CarController::class, 'index']);
