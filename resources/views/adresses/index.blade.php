@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adresses</h1>
        <a href="{{ route('adresses.create') }}" class="btn btn-success mb-3">Add New Adress</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adress</th>
                    <th>Adress2</th>
                    <th>District</th>
                    <th>City ID</th>
                    <th>Postal Code</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adresses as $adress)
                    <tr>
                        <td>{{ $adress->address_id }}</td>
                        <td>{{ $adress->address }}</td>
                        <td>{{ $adress->address2 }}</td>
                        <td>{{ $adress->district }}</td>
                        <td>{{ $adress->city_id }}</td>
                        <td>{{ $adress->postal_code }}</td>
                        <td>{{ $adress->phone }}</td>
                        <td>
                            <a href="{{ route('adresses.edit', $adress->address_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('adresses.destroy', $adress->address_id) }}" method="POST" style="display:inline;">
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
    {       { $actors->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection