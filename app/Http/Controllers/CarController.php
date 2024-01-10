<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Car;
use App\Models;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();
        $cars = Car::all(); // Retrieve all cars from the database
        return view('cars.index', compact('cars','manufacturers')); // Pass the car data to the view
    }
    public function create()
{
    $manufacturers = Manufacturer::all(); // Assuming you have a Manufacturer model
    return view('cars.create', compact('manufacturers'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'model' => 'required|max:255',
        'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        'salesperson_email' => 'required|email',
        'manufacturer_id' => 'required|exists:manufacturers,id',
    ]);

    $car = Car::create($validatedData);

    return redirect()->route('cars.index')->with('success', 'New car added successfully.');
}
}
