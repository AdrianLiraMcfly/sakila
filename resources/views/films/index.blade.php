@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Films</h1>
        <a href="{{ route('films.create') }}" class="btn btn-success mb-3">Add New Film</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Rating</th>
                    <th>Release Year</th>
                    <th>Rental Rate</th>
                    <th>Length</th>
                    <th>Replacement Cost</th>
                    <th>Special Features</th>
                    <th>Language</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                    <tr>
                        <td>{{ $film->film_id }}</td>
                        <td>{{ $film->title }}</td>
                        <td>{{ $film->description }}</td>
                        <td>{{ $film->rating }}</td>
                        <td>{{ $film->release_year }}</td>
                        <td>{{ $film->rental_rate }}</td>
                        <td>{{ $film->length }}</td>
                        <td>{{ $film->replacement_cost }}</td>
                        <td>{{ $film->special_features }}</td>
                        <td>{{ $film->language_id }}</td>
                        
                        <td>
                            <a href="{{ route('films.show', $film->film_id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('films.edit', $film->film_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('films.destroy', $film->film_id) }}" method="POST" style="display:inline;">
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
            {{ $films->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection