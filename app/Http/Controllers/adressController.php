<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\City;

class adressController extends Controller
{
    public function index()
    {
        $adresses = Address::paginate(10);
        $cities = City::all();
        return view('adresses.index', compact('adresses', 'cities'));
    }

    public function show(Address $adress)
    {
        return view('adresses.show', compact('adress'));
    }
    
    public function create()
    {
        $cities = City::all();
        return view('adresses.create', compact('cities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'address2' => 'required',
            'district' => 'required',
            'city_id' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
        ]);
        Address::create($request->all());
        return redirect()->route('adresses.index')->with('success', 'Address created successfully.');
    }
    
    public function edit(Address $adress)
    {
        $cities = City::all();
        return view('adresses.edit', compact('adress', 'cities'));
    }

    public function update(Request $request, Address $adress)
    {
        $request->validate([
            'address' => 'required',
            'address2' => 'required',
            'district' => 'required',
            'city_id' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
        ]);
        $adress->update($request->all());
        return redirect()->route('adresses.index')->with('warning', 'Address updated successfully.');
    }
    public function destroy(Address $adress)
    {
        $adress->delete();
        return redirect()->route('adresses.index')->with('success', 'Address deleted successfully.');
    }
}
