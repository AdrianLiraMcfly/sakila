@extends('layouts.app')

@section('content')
    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <input type="text" class="form-control" id="film_id" name="film_id">
        </div>
        <div class="mb-3">
            <label for="store_id" class="form-label">Store</label>
            <input type="text" class="form-control" id="store_id" name="store_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection