@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cities</h1>
        <a href="{{ route('city.create') }}" class="btn btn-primary">Create City</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->city }}</td>
                        <td>{{ $city->country_id }}</td>
                        <td>
                            <a href="{{ route('city.edit', $city->city_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('city.destroy', $city->city_id) }}" method="POST" style="display: inline">
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
            {{ $cities->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection