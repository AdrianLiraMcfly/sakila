@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-edit"></i> Edit Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('staffs.index') }}">Staffs</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Staff</h3>
                </div>
                <form action="{{ route('staffs.update', $staff->staff_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                id="first_name" name="first_name" value="{{ old('first_name', $staff->first_name) }}" placeholder="Enter first name">
                            @error('first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                id="last_name" name="last_name" value="{{ old('last_name', $staff->last_name) }}" placeholder="Enter last name">
                            @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address_id">Address ID</label>
                            <select class="form-control @error('address_id') is-invalid @enderror" 
                                id="address_id" name="address_id" value="{{ old('address_id', $staff->address_id) }}" placeholder="Select address">
                                <option value="">Select address</option>
                                @foreach ($addresses as $address)
                                    <option value="{{ $address->address_id }}">{{ $address->address }}</option>
                                @endforeach
                            </select>
                            @error('address_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email', $staff->email) }}" placeholder="Enter email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="store_id">Store ID</label>
                            <select class="form-control @error('store_id') is-invalid @enderror" 
                                id="store_id" name="store_id" value="{{ old('store_id', $staff->store_id) }}" placeholder="Select store ID">
                                <option value="">Select store ID</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->store_id }}">{{ $store->store_id }}</option>
                                @endforeach
                            </select>
                            @error('store_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="active">Active</label>
                            <select class="form-control @error('active') is-invalid @enderror" 
                                id="active" name="active" value="{{ old('active', $staff->active) }}" placeholder="Select active status">
                                <option value="">Select active status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('active')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role_id">Rol</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" 
                                id="role_id" name="role_id" value="{{ old('role_id', $staff->role_id) }}" placeholder="Select role">
                                <option value="">Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                id="username" name="username" value="{{ old('username', $staff->username) }}" placeholder="Enter username">
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('staffs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Staff
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection