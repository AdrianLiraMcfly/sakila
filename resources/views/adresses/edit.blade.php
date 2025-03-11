@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Adress</h1>
        <form action="{{ route('adresses.update', $adress->address_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="adress">Adress</label>
                <input type="text" class="form-control" id="adress" name="adress" value="{{ $adress->address }}">
            </div>
            <div class="form-group">
                <label for="adress2">Adress2</label>
                <input type="text" class="form-control" id="adress2" name="adress2" value="{{ $adress->address2 }}">
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" name="district" value="{{ $adress->district }}">
            </div>
            <div class="form-group">
                <label for="city_id">City ID</label>
                <input type="text" class="form-control" id="city_id" name="city_id" value="{{ $adress->city_id }}">
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $adress->postal_code }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $adress->phone }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection