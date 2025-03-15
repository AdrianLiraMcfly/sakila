@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-film"></i> Edit Film</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('films.index') }}">Films</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Film</h3>
                </div>
                <form action="{{ route('films.update', $film->film_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                id="title" name="title" value="{{ old('title', $film->title) }}" placeholder="Enter title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" value="{{ old('description', $film->description) }}" placeholder="Enter description">
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="release_year">Release Year</label>
                            <input type="text" class="form-control @error('release_year') is-invalid @enderror" 
                                id="release_year" name="release_year" value="{{ old('release_year', $film->release_year) }}" placeholder="Enter release year">
                            @error('release_year')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control @error('language') is-invalid @enderror" 
                                id="language" name="language" value="{{ old('language', $film->language_id) }}" placeholder="Enter language">
                            @error('language')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rental_duration">Rental Duration</label>
                            <input type="text" class="form-control @error('rental_duration') is-invalid @enderror" 
                                id="rental_duration" name="rental_duration" value="{{ old('rental_duration', $film->rental_duration) }}" placeholder="Enter rental duration">
                            @error('rental_duration')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rental_rate">Rental Rate</label>
                            <input type="text" class="form-control @error('rental_rate') is-invalid @enderror" 
                                id="rental_rate" name="rental_rate" value="{{ old('rental_rate', $film->rental_rate) }}" placeholder="Enter rental rate">
                            @error('rental_rate')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="length">Length</label>
                            <input type="text" class="form-control @error('length') is-invalid @enderror" 
                                id="length" name="length" value="{{ old('length', $film->length) }}" placeholder="Enter length">
                            @error('length')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="replacement_cost">Replacement Cost</label>
                            <input type="text" class="form-control @error('replacement_cost') is-invalid @enderror" 
                                id="replacement_cost" name="replacement_cost" value="{{ old('replacement_cost', $film->replacement_cost) }}" placeholder="Enter replacement cost">
                            @error('replacement_cost')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="text" class="form-control @error('rating') is-invalid @enderror" 
                                id="rating" name="rating" value="{{ old('rating', $film->rating) }}" placeholder="Enter rating">
                            @error('rating')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="special_features">Special Features</label>
                            <input type="text" class="form-control @error('special_features') is-invalid @enderror" 
                                id="special_features" name="special_features" value="{{ old('special_features', $film->special_features) }}" placeholder="Enter special features">
                            @error('special_features')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('films.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection