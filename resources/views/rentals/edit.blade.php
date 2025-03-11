@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Rental</h1>
        <form action="{{ route('rentals.update', $rental->rental_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="rental_date">Rental Date</label>
                <input type="date" class="form-control" id="rental_date" name="rental_date" value="{{ $rental->rental_date }}">
            </div>
            <div class="form-group">
                <label for="inventory_id">Inventory</label>
                <input type="text" class="form-control" id="inventory_id" name="inventory_id" value="{{ $rental->inventory_id }}">
            </div>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $rental->customer_id }}">
            </div>
            <div class="form-group">
                <label for="return_date">Return Date</label>
                <input type="date" class="form-control" id="return_date" name="return_date" value="{{ $rental->return_date }}">
            </div>
            <div class="form-group">
                <label for="staff_id">Staff</label>
                <input type="text" class="form-control" id="staff_id" name="staff_id" value="{{ $rental->staff_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Rental</button>
        </form>
    </div>
@endsection
