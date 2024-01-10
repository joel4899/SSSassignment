@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
<div class="container mt-4">
    <h1>All Car Models</h1>

    <div class="mb-2">
        <a href="{{ route('cars.create') }}" class="btn btn-success">Add New Car</a>
    </div>

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
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info btn-sm">Details</a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirmDelete()"style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
@push('scripts')
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this record?');
    }
</script>
@endpush