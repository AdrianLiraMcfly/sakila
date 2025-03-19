<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\Rental;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(10);
        $staffs = Staff::all();
        $customers = Customer::all();
        $rentals = Rental::all();
        return view('payments.index', compact('payments', 'staffs', 'customers', 'rentals'));
    }
    public function create()
    {
        $customers = Customer::all();
        $staffs = Staff::all();
        $rentals = Rental::all();
        return view('payments.create', compact('customers', 'staffs', 'rentals'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'customer_id' => 'required',
            'rental_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ]);
        Payment::create($request->all());
        return redirect()->route('payments.index');
    }
    public function edit(Payment $payment)
    {
        $customers = Customer::all();
        $staffs = Staff::all();
        $rentals = Rental::all();
        return view('payments.edit', compact('payment', 'customers', 'staffs', 'rentals'));
    }
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'staff_id' => 'required',
            'customer_id' => 'required',
            'rental_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ]);
        $payment->update($request->all());
        return redirect()->route('payments.index');
    }
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
