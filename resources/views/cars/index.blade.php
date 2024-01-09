@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>All Car Models</h1>
    
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
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->salesperson_email }}</td>
                <td>{{ $car->manufacturer->name }}</td>
               
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection