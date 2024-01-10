@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>All Manufacturers</h1>
    
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($manufacturers as $manufacturer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $manufacturer->name }}</td>
    <td>{{ $manufacturer->address }}</td>
    <td>{{ $manufacturer->phone }}</td>

               
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection