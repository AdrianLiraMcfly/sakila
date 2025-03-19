@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-calendar-edit"></i> Edit Rental</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('rentals.index') }}">Rentals</a></li>
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
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Rental</h3>
                </div>
                <form action="{{ route('rentals.update', $rental->rental_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rental_date">Rental Date</label>
                            <input type="date" class="form-control @error('rental_date') is-invalid @enderror" 
                                id="rental_date" name="rental_date" value="{{ old('rental_date', $rental->rental_date) }}">
                            @error('rental_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inventory_id">Inventory</label>
                            <select class="form-control @error('inventory_id') is-invalid @enderror" 
                                id="inventory_id" name="inventory_id">
                                <option value="">Select Inventory</option>
                                @foreach($inventories as $inventory)
                                    <option value="{{ $inventory->inventory_id }}" 
                                        {{ old('inventory_id', $rental->inventory_id) == $inventory->inventory_id ? 'selected' : '' }}>
                                        {{ $inventory->inventory_id }} - {{ $inventory->film->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('inventory_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select class="form-control @error('customer_id') is-invalid @enderror" 
                                id="customer_id" name="customer_id">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->customer_id }}" 
                                        {{ old('customer_id', $rental->customer_id) == $customer->customer_id ? 'selected' : '' }}>
                                        {{ $customer->customer_id }} - {{ $customer->first_name }} {{ $customer->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="return_date">Return Date</label>
                            <input type="date" class="form-control @error('return_date') is-invalid @enderror" 
                                id="return_date" name="return_date" value="{{ old('return_date', $rental->return_date) }}">
                            @error('return_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="staff_id">Staff</label>
                            <select class="form-control @error('staff_id') is-invalid @enderror" 
                                id="staff_id" name="staff_id">
                                <option value="">Select Staff</option>
                                @foreach($staffs as $staff)
                                    <option value="{{ $staff->staff_id }}" 
                                        {{ old('staff_id', $rental->staff_id) == $staff->staff_id ? 'selected' : '' }}>
                                        {{ $staff->staff_id }} - {{ $staff->first_name }} {{ $staff->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('staff_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Rental
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection