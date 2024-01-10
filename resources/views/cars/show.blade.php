@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Car Details
        </div>
        <div class="card-body">
            <h5 class="card-title">Model: {{ $car->model }}</h5>
            <p class="card-text">Year: {{ $car->year }}</p>
            <p class="card-text">Salesperson Email: {{ $car->salesperson_email }}</p>
            <p class="card-text">Manufacturer: {{ $car->manufacturer->name }}</p>

            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
@endsection
