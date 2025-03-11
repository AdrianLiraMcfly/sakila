@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Film</h1>
        <form action="{{ route('films.update', $film->film_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $film->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $film->description }}">
            </div>
            <div class="form-group">
                <label for="release_year">Release Year</label>
                <input type="text" class="form-control" id="release_year" name="release_year" value="{{ $film->release_year }}">
            </div>
            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language" value="{{ $film->language_id }}">
            </div>
            <div class="form-group">
                <label for="rental_duration">Rental Duration</label>
                <input type="text" class="form-control" id="rental_duration" name="rental_duration" value="{{ $film->rental_duration }}">
            </div>
            <div class="form-group">
                <label for="rental_rate">Rental Rate</label>
                <input type="text" class="form-control" id="rental_rate" name="rental_rate" value="{{ $film->rental_rate }}">
            </div>
            <div class="form-group">
                <label for="length">Length</label>
                <input type="text" class="form-control" id="length" name="length" value="{{ $film->length }}">
            </div>
            <div class="form-group">
                <label for="replacement_cost">Replacement Cost</label>
                <input type="text" class="form-control" id="replacement_cost" name="replacement_cost" value="{{ $film->replacement_cost }}">
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="text" class="form-control" id="rating" name="rating" value="{{ $film->rating }}">
            </div>
            <div class="form-group">
                <label for="special_features">Special Features</label>
                <input type="text" class="form-control" id="special_features" name="special_features" value="{{ $film->special_features }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection