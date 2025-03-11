@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Country</h1>
        <form action="{{ route('countries.update', $country->country_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Country</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $country->country }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection