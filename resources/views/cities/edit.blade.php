@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit City</h1>
        <form action="{{ route('city.update', $city->city_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $city->city }}">
            </div>
            <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" id="country_id" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update City</button>
        </form>
    </div>
@endsection