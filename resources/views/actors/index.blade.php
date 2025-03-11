@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Actors</h1>
        <a href="{{ route('actors.create') }}" class="btn btn-success mb-3">Add New Actor</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actors as $actor)
                    <tr>
                        <td>{{ $actor->actor_id }}</td>
                        <td>{{ $actor->first_name }}</td>
                        <td>{{ $actor->last_name }}</td>
                        <td>
                            <a href="{{ route('actors.edit', $actor->actor_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('actors.destroy', $actor->actor_id) }}" method="POST" style="display:inline;">
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
        {{ $actors->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection