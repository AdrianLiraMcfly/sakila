<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;
use App\Models\country;

class cityController extends Controller
{
    public function index()
    {
        $cities = city::paginate(10);
        $countries = country::all();
        return view('cities.index', compact('cities', 'countries'));
    }
    
    public function create()
    {
        $countries = country::all();
        return view('cities.create', compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);
        city::create($request->all());
        return redirect()->route('cities.index');
    }
    public function edit(city $city)
    {
        $countries = country::all();
        return view('cities.edit', compact('city', 'countries'));
    }
    public function update(Request $request, city $city)
    {
        $request->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);
        $city->update($request->all());
        return redirect()->route('cities.index');
    }
    public function destroy(city $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
