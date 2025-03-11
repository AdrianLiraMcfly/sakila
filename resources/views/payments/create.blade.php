@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add Payment</h1>
                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="customer">Customer</label>
                        <input type="text" class="form-control" id="customer" name="customer">
                    </div>
                    <div class="form-group">
                        <label for="staff">Staff</label>
                        <input type="text" class="form-control" id="staff" name="staff">
                    </div>
                    <div class="form-group">
                        <label for="rental">Rental</label>
                        <input type="text" class="form-control" id="rental" name="rental">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="payment_date">Payment Date</label>
                        <input type="text" class="form-control" id="payment_date" name="payment_date">
                    </div>
                    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection