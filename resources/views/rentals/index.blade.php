@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rentals</h1>
        <a href="{{ route('rentals.create') }}" class="btn btn-primary">Add Rental</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Rental Date</th>
                    <th>inventory</th>
                    <th>Customer</th>
                    <th>Return Date</th>
                    <th>Staff</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->rental_date }}</td>
                        <td>{{ $rental->inventory_id }}</td>
                        <td>{{ $rental->customer_id }}</td>
                        <td>{{ $rental->return_date }}</td>
                        <td>{{ $rental->staff_id }}</td>
                        <td>
                            <a href="{{ route('rentals.edit', $rental->rental_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('rentals.destroy', $rental->rental_id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $rentals->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection