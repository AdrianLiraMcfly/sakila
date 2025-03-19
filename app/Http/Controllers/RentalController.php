<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Inventory;
use App\Models\Customer;
use App\Models\Staff;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::paginate(10);
        $inventories = Inventory::all();
        $customers = Customer::all();
        $staffs = Staff::all();
        return view('rentals.index', compact('rentals', 'inventories', 'customers', 'staffs'));
    }
    public function create()
    {
        $inventories = Inventory::all();
        $customers = Customer::all();
        $staffs = Staff::all();
        return view('rentals.create', compact('inventories', 'customers', 'staffs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required',
            'customer_id' => 'required',
            'staff_id' => 'required',
            'rental_date' => 'required',
            'return_date' => 'required',
        ]);
        Rental::create($request->all());
        return redirect()->route('rentals.index');
    }
    public function edit(Rental $rental)
    {
        $inventories = Inventory::all();
        $customers = Customer::all();
        $staffs = Staff::all();
        return view('rentals.edit', compact('rental', 'inventories', 'customers', 'staffs'));
    }
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'inventory_id' => 'required',
            'customer_id' => 'required',
            'staff_id' => 'required',
            'rental_date' => 'required',
            'return_date' => 'required',
        ]);
        $rental->update($request->all());
        return redirect()->route('rentals.index');
    }
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index');
    }
}
