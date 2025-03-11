@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Rental</h1>
        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rental_date">Rental Date</label>
                <input type="date" class="form-control" id="rental_date" name="rental_date">
            </div>
            <div class="form-group">
                <label for="inventory_id">Inventory</label>
                <input type="text" class="form-control" id="inventory_id" name="inventory_id">
            </div>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <input type="text" class="form-control" id="customer_id" name="customer_id">
            </div>
            <div class="form-group">
                <label for="return_date">Return Date</label>
                <input type="date" class="form-control" id="return_date" name="return_date">
            </div>
            <div class="form-group">
                <label for="staff_id">Staff</label>
                <input type="text" class="form-control" id="staff_id" name="staff_id">
            </div>
            <button type="submit" class="btn btn-primary">Add Rental</button>
        </form>
    </div>
@endsection
