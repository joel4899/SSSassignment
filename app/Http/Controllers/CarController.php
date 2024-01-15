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
        
        $cars = Car::all(); 
        $manufacturers = Manufacturer::all(); // Retrieve all cars from the database
        return view('cars.index', compact('cars','manufacturers')); // Pass the car data to the view
    }
    public function create()
{
    $manufacturers = Manufacturer::all(); 
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
public function show($id)
{
    $car = Car::with('manufacturer')->findOrFail($id);
    $manufacturer = $car->manufacturer;

    return view('cars.show', compact('car', 'manufacturer'));
}


public function destroy($id)
{
    $car = Car::findOrFail($id);
    $car->delete();
    return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
}
public function edit($id)
{
    $car = Car::findOrFail($id);
    $manufacturers = Manufacturer::all(); 
    return view('cars.edit', compact('car', 'manufacturers'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'model' => 'required|max:255',
        'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        'salesperson_email' => 'required|email',
        'manufacturer_id' => 'required|exists:manufacturers,id',
    ]);

    $car = Car::findOrFail($id);
    $car->update($validatedData);

    return redirect()->route('cars.index')->with('success', 'Car details updated successfully.');
}

}
