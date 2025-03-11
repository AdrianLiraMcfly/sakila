@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Costumer</h1>
        <form action="{{ route('customers.update', $customer->customer_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="store">Store</label>
                <input type="text" class="form-control" id="store" name="store" value="{{ $customer->store_id }}">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $customer->email }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address_id }}">
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input type="text" class="form-control" id="active" name="active" value="{{ $customer->active }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>