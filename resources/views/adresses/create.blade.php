@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Adress</h1>
        <form action="{{ route('adresses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="adress">Adress</label>
                <input type="text" class="form-control" id="adress" name="adress">
            </div>
            <div class="form-group">
                <label for="adress2">Adress2</label>
                <input type="text" class="form-control" id="adress2" name="adress2">
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" name="district">
            </div>
            <div class="form-group">
                <label for="city_id">City ID</label>
                <input type="text" class="form-control" id="city_id" name="city_id">
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection