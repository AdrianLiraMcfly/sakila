<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;

class countryController extends Controller
{
    public function index()
    {
        $countries = country::paginate(10);
        return view('countries.index', compact('countries'));
    }
    public function create()
    {
        return view('countries.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
        ]);
        country::create($request->all());
        return redirect()->route('countries.index');
    }
    public function edit(country $country)
    {
        return view('countries.edit', compact('country'));
    }
    public function update(Request $request, country $country)
    {
        $request->validate([
            'country' => 'required',
        ]);
        $country->update($request->all());
        return redirect()->route('countries.index');
    }
    public function destroy(country $country)
    {
        $country->delete();
        return redirect()->route('countries.index');
    }
}
