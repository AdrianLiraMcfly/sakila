@extends('layouts.app')

@section('content')
    <form action="{{ route('actors.update', $actor->actor_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <h1>Edit Actor</h1>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $actor->first_name }}">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $actor->last_name }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection