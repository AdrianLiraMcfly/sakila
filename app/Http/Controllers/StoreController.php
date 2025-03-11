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
        $staffs = Staff::all();
        $addresses = Address::all();
        return view('stores.index', compact('stores', 'staffs', 'addresses'));
    }
    public function create()
    {
        return view('stores.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id' => 'required',
        ]);
        Store::create($request->all());
        return redirect()->route('stores.index');
    }
    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id' => 'required',
        ]);
        $store->update($request->all());
        return redirect()->route('stores.index');
    }
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index');
    }
}
