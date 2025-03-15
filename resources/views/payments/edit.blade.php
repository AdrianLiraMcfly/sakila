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
                            <input type="text" class="form-control @error('customer') is-invalid @enderror" 
                                id="customer" name="customer" value="{{ old('customer', $payment->customer_id) }}" placeholder="Enter customer">
                            @error('customer')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="staff">Staff</label>
                            <input type="text" class="form-control @error('staff') is-invalid @enderror" 
                                id="staff" name="staff" value="{{ old('staff', $payment->staff_id) }}" placeholder="Enter staff">
                            @error('staff')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rental">Rental</label>
                            <input type="text" class="form-control @error('rental') is-invalid @enderror" 
                                id="rental" name="rental" value="{{ old('rental', $payment->rental_id) }}" placeholder="Enter rental">
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
                            <input type="text" class="form-control @error('payment_date') is-invalid @enderror" 
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