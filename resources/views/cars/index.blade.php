@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="container mt-4">
    <h1>All Car Models</h1>

    {{-- Dropdown menu for filtering cars by manufacturer --}}
    <div class="form-group">
        <label for="manufacturerFilter">Filter by Manufacturer:</label>
        <select id="manufacturerFilter" class="form-control">
            <option value="">All Manufacturers</option>
            @foreach ($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
            @endforeach
        </select>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Year</th>
                <th>Salesperson Email</th>
                <th>Manufacturer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr data-manufacturer-id="{{ $car->manufacturer->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->salesperson_email }}</td>
                    <td>{{ $car->manufacturer->name }}</td>
                    <a href="{{ route('cars.create') }}" class="btn btn-success">Add New</a>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- JavaScript for filtering --}}
<script>
    $(document).ready(function () {
        $('#manufacturerFilter').on('change', function () {
            var selectedManufacturerId = $(this).val();

           
            $('tbody tr').hide();

            if (selectedManufacturerId === '') {
                
                $('tbody tr').show();
            } else {
              
                $('tbody tr[data-manufacturer-id="' + selectedManufacturerId + '"]').show();
            }
        });
    });
</script>
@endsection
