@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Costumer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="store">Store</label>
                <input type="text" class="form-control" id="store" name="store">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input type="text" class="form-control" id="active" name="active">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>