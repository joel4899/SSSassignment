<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all(); // Retrieve all cars from the database
        return view('cars.index', compact('cars')); // Pass the car data to the view
    }
}
