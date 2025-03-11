<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
class costumerController extends Controller
{
    public function index()
    {
        $costumers = customer::paginate(10);
        return view('costumers.index', compact('costumers'));
    }
    public function create()
    {
        return view('costumers.create');
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
        return view('costumers.edit', compact('customer'));
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
