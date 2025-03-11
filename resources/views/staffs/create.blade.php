@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Staff</h1>
        <form action="{{ route('staffs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="address_id">Address ID</label>
                <input type="text" class="form-control" id="address_id" name="address_id">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="store_id">Store ID</label>
                <input type="text" class="form-control" id="store_id" name="store_id">
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input type="text" class="form-control" id="active" name="active">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <button type="submit" class="btn btn-primary">Add Staff</button>
        </form>
    </div>
@endsection