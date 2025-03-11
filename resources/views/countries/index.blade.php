@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Countries</h1>
        <a href="{{ route('countries.create') }}" class="btn btn-primary">Add Country</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->country }}</td>
                        <td>
                            <a href="{{ route('countries.edit', $country->country_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('countries.destroy', $country->country_id) }}" method="POST" style="display: inline;">
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
            {{ $countries->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection