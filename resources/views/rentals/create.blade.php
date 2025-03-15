@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-calendar-plus"></i> Add Rental</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('rentals.index') }}">Rentals</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Add New Rental</h3>
                </div>
                <form action="{{ route('rentals.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rental_date">Rental Date</label>
                            <input type="date" class="form-control @error('rental_date') is-invalid @enderror" 
                                id="rental_date" name="rental_date" value="{{ old('rental_date') }}">
                            @error('rental_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inventory_id">Inventory</label>
                            <input type="text" class="form-control @error('inventory_id') is-invalid @enderror" 
                                id="inventory_id" name="inventory_id" value="{{ old('inventory_id') }}" placeholder="Enter inventory ID">
                            @error('inventory_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <input type="text" class="form-control @error('customer_id') is-invalid @enderror" 
                                id="customer_id" name="customer_id" value="{{ old('customer_id') }}" placeholder="Enter customer ID">
                            @error('customer_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="return_date">Return Date</label>
                            <input type="date" class="form-control @error('return_date') is-invalid @enderror" 
                                id="return_date" name="return_date" value="{{ old('return_date') }}">
                            @error('return_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="staff_id">Staff</label>
                            <input type="text" class="form-control @error('staff_id') is-invalid @enderror" 
                                id="staff_id" name="staff_id" value="{{ old('staff_id') }}" placeholder="Enter staff ID">
                            @error('staff_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Add Rental
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection