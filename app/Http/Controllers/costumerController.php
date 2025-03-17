<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\address;
use App\Models\store;

class costumerController extends Controller
{
    public function index()
    {
        $costumers = customer::paginate(10);
        $addres = address::all();
        $store = store::all();
        return view('costumers.index', compact('costumers', 'addres', 'store'));
    }
    public function create()
    {
        $addresses = address::all();
        $stores = store::all();
        return view('costumers.create', compact('addresses', 'stores'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'adress_id' => 'required',
            'active' => 'required',
        ]);
        customer::create($request->all());
        return redirect()->route('costumers.index');
    }
    public function edit(customer $customer)
    {
        $addresses = address::all();
        $stores = store::all();
        return view('costumers.edit', compact('customer', 'addresses', 'stores'));
    }
    public function update(Request $request, customer $customer)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'adress_id' => 'required',
            'active' => 'required',
        ]);
        $customer->update($request->all());
        return redirect()->route('costumers.index');
    }
    public function destroy(customer $customer)
    {
        $customer->delete();
        return redirect()->route('costumers.index');
    }
}
