@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stores</h1>
        <a href="{{ route('stores.create') }}" class="btn btn-primary">Add Store</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Store ID</th>
                    <th>Manager Staff ID</th>
                    <th>Address ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stores as $store)
                    <tr>
                        <td>{{ $store->store_id }}</td>
                        <td>{{ $store->manager_staff_id }}</td>
                        <td>{{ $store->address_id }}</td>
                        <td>
                            <a href="{{ route('stores.edit', $store->store_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('stores.destroy', $store->store_id) }}" method="POST" style="display: inline;">
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
            {{ $stores->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection