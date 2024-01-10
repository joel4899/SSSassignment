@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Car Details</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" name="model" id="model" value="{{ old('model', $car->model) }}" required>
            @if ($errors->has('model'))
                <div class="invalid-feedback">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" name="year" id="year" value="{{ old('year', $car->year) }}" required>
            @if ($errors->has('year'))
                <div class="invalid-feedback>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="salesperson_email">Salesperson Email:</label>
            <input type="email" class="form-control {{ $errors->has('salesperson_email') ? 'is-invalid' : '' }}" name="salesperson_email" id="salesperson_email" value="{{ old('salesperson_email', $car->salesperson_email) }}" required>
            @if ($errors->has('salesperson_email'))
                <div class="invalid-feedback">
                </div>
            @endif
        </div>

        <div class="form-group">
                    <label for="manufacturer">Manufacturer</label>
                    <select class="form-control" id="manufacturer" name="manufacturer_id" required>
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == $car->manufacturer_id ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
