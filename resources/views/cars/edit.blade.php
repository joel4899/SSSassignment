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
        @method('PUT') <!-- Specify the HTTP method to be PUT -->

        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" name="model" id="model" value="{{ old('model', $car->model) }}" required>
            @if ($errors->has('model'))
                <div class="invalid-feedback">
                    {{ $errors->first('model') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" name="year" id="year" value="{{ old('year', $car->year) }}" required>
            @if ($errors->has('year'))
                <div class="invalid-feedback">
                    {{ $errors->first('year') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="salesperson_email">Salesperson Email:</label>
            <input type="email" class="form-control {{ $errors->has('salesperson_email') ? 'is-invalid' : '' }}" name="salesperson_email" id="salesperson_email" value="{{ old('salesperson_email', $car->salesperson_email) }}" required>
            @if ($errors->has('salesperson_email'))
                <div class="invalid-feedback">
                    {{ $errors->first('salesperson_email') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="manufacturer">Manufacturer:</label>
            <select class="form-control {{ $errors->has('manufacturer_id') ? 'is-invalid' : '' }}" name="manufacturer_id" id="manufacturer" required>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" {{ $car->manufacturer_id == $manufacturer->id ? 'selected' : '' }}>
                        {{ $manufacturer->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('manufacturer_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('manufacturer_id') }}
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
