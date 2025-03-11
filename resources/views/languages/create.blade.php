@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add Language</h1>
                <form action="{{ route('languages.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" class="form-control" id="language" name="language">
                    </div>
                    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection