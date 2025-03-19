<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Store;
use App\Models\Address;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::paginate(10);
        $stores = Store::all();
        $address = Address::all();
        return view('staffs.index', compact('staffs', 'address', 'stores'));
    }
    public function create()
    {
        $stores = Store::all();
        $addresses = Address::all();
        return view('staffs.create', compact('stores', 'addresses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address_id' => 'required',
            'store_id' => 'required',
            'email' => 'required',
            'active' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        Staff::create($request->all());
        return redirect()->route('staffs.index');
    }
    public function edit(Staff $staff)
    {
        $stores = Store::all();
        $addresses = Address::all();
        return view('staffs.edit', compact('staff', 'stores', 'addresses'));
    }
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address_id' => 'required',
            'store_id' => 'required',
            'email' => 'required',
            'active' => 'required',
            'username' => 'required',
        ]);

        if ($request->filled('password')) {
            $staff->password = $request->password;
        }
        $staff->update($request->all());
        return redirect()->route('staffs.index');
    }
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staffs.index');
    }
}
