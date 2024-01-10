<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
Route::redirect('/', '/cars');



Route::get('/manufacturer', [ManufacturerController::class, 'index']);

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
