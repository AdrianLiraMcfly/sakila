@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Payments</h1>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{ route('payments.create')}}">Add Payment</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Staff</th>
                            <th>Rental</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->customer_id }}</td>
                                <td>{{ $payment->staff_id }}</td>
                                <td>{{ $payment->rental_id }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('payments.edit', $payment->payment_id) }}">Edit</a>
                                    <form action="{{ route('payments.destroy', $payment->payment_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $payments->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection