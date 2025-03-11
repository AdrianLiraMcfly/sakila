@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Store</h1>
        <form action="{{ route('stores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="manager_staff_id">Manager Staff ID</label>
                <input type="text" class="form-control" id="manager_staff_id" name="manager_staff_id">
            </div>
            <div class="form-group">
                <label for="address_id">Address ID</label>
                <input type="text" class="form-control" id="address_id" name="address_id">
            </div>
            <button type="submit" class="btn btn-primary">Add Store</button>
        </form>
    </div>
@endsection