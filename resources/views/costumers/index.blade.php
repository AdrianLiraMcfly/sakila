@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Costumers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Costumer</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>store</th>
                    <th>Fisrt Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($costumers as $costumer)
                    <tr>
                        <td>{{ $costumer->store_id }}</td>
                        <td>{{ $costumer->first_name }}</td>
                        <td>{{ $costumer->last_name }}</td>
                        <td>{{ $costumer->email }}</td>
                        <td>{{ $costumer->address_id }}</td>
                        <td>{{ $costumer->active }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $costumer->customer_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('customers.destroy', $costumer->customer_id) }}" method="POST" style="display: inline;">
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
            {{ $costumers->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection