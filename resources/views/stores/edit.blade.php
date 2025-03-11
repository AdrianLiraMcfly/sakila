@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Store</h1>
        <form action="{{ route('stores.update', $store->store_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="manager_staff_id">Manager Staff ID</label>
                <input type="text" class="form-control" id="manager_staff_id" name="manager_staff_id" value="{{ $store->manager_staff_id }}">
            </div>
            <div class="form-group">
                <label for="address_id">Address ID</label>
                <input type="text" class="form-control" id="address_id" name="address_id" value="{{ $store->address_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Store</button>
        </form>
    </div>
@endsection