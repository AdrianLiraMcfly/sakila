<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Staff;
use App\Models\Address;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(10);
        $staff = Staff::all();
        $address = Address::all();
        return view('stores.index', compact('stores', 'staff', 'address'));
    }
    public function create()
    {
        $staffs = Staff::all();
        $addresses = Address::all();
        return view('stores.create', compact('staffs', 'addresses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'manager_staff_id' => 'required|unique:store,manager_staff_id',
            'address_id' => 'required',
        ]);
        Store::create($request->all());
        return redirect()->route('stores.index')->with('success','Store created successfully.');
    }
    public function edit(Store $store)
    {
        $staffs = Staff::all();
        $addresses = Address::all();
        return view('stores.edit', compact('store', 'staffs', 'addresses'));
    }
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'manager_staff_id' => 'required|unique:store,manager_staff_id',
            'address_id' => 'required',
        ]);
        $store->update($request->all());
        return redirect()->route('stores.index')->with('warning','Store updated successfully');
    }
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index')->with('success','Store deleted successfully');
    }
}
