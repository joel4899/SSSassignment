{{-- resources/views/cars/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Car</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" name="model" id="model" required>
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" class="form-control" name="year" id="year" required>
        </div>

        <div class="form-group">
            <label for="salesperson_email">Salesperson Email:</label>
            <input type="email" class="form-control" name="salesperson_email" id="salesperson_email" required>
        </div>

        <div class="form-group">
            <label for="manufacturer">Manufacturer:</label>
            <select class="form-control" name="manufacturer_id" id="manufacturer" required>
                <option value="">Select Manufacturer</option>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ url('/cars') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
