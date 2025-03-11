@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Language</h1>
                <form action="{{ route('languages.update', $language->language_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" class="form-control" id="language" name="language" value="{{ $language->name }}">
                    </div>
                    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection