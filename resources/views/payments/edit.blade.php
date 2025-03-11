@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Payment</h1>
                <form action="{{ route('payments.update', $payment->payment_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="customer">Customer</label>
                        <input type="text" class="form-control" id="customer" name="customer" value="{{ $payment->customer_id }}">
                    </div>
                    <div class="form-group">
                        <label for="staff">Staff</label>
                        <input type="text" class="form-control" id="staff" name="staff" value="{{ $payment->staff_id }}">
                    </div>
                    <div class="form-group">
                        <label for="rental">Rental</label>
                        <input type="text" class="form-control" id="rental" name="rental" value="{{ $payment->rental_id }}">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}">
                    </div>
                    <div class="form-group">
                        <label for="payment_date">Payment Date</label>
                        <input type="text" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date }}">
                    </div>
                    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection