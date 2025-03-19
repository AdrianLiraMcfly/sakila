@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-money-bill"></i> Edit Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Payments</a></li>
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
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Payment</h3>
                </div>
                <form action="{{ route('payments.update', $payment->payment_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <select class="form-control @error('customer') is-invalid @enderror" 
                                id="customer_id" name="customer_id">
                                <option value="">Select customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->customer_id }}" {{ old('customer', $payment->customer_id) == $customer->customer_id ? 'selected' : '' }}>
                                        {{ $customer->first_name }} {{ $customer->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="staff">Staff</label>
                            <select class="form-control @error('staff') is-invalid @enderror" 
                                id="staff_id" name="staff_id">
                                <option value="">Select staff</option>
                                @foreach($staffs as $staff)
                                    <option value="{{ $staff->staff_id }}" {{ old('staff', $payment->staff_id) == $staff->staff_id ? 'selected' : '' }}>
                                        {{ $staff->first_name }} {{ $staff->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('staff')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rental">Rental</label>
                            <select class="form-control @error('rental') is-invalid @enderror" 
                                id="rental_id" name="rental_id">
                                <option value="">Select rental</option>
                                @foreach($rentals as $rental)
                                    <option value="{{ $rental->rental_id }}" {{ old('rental', $payment->rental_id) == $rental->rental_id ? 'selected' : '' }}>
                                        {{ $rental->rental_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rental')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control @error('amount') is-invalid @enderror" 
                                id="amount" name="amount" value="{{ old('amount', $payment->amount) }}" placeholder="Enter amount">
                            @error('amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment_date">Payment Date</label>
                            <input type="date" class="form-control @error('payment_date') is-invalid @enderror" 
                                id="payment_date" name="payment_date" value="{{ old('payment_date', $payment->payment_date) }}" placeholder="Enter payment date">
                            @error('payment_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection