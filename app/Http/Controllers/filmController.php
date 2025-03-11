<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\film;
use App\Models\language;
use App\Models\category;

class filmController extends Controller
{
    public function index()
    {
        $films = film::paginate(10);
        $languages = language::all();
        $categories = category::all();
        return view('films.index', compact('films', 'languages', 'categories'));
    }
    public function create()
    {
        return view('films.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'language_id' => 'required',
            'rental_duration' => 'required',
            'rental_rate' => 'required',
            'length' => 'required',
            'replacement_cost' => 'required',
            'rating' => 'required',
            'special_features' => 'required',
        ]);
        film::create($request->all());
        return redirect()->route('films.index');
    }
    public function edit(film $film)
    {
        return view('films.edit', compact('film'));
    }
    public function update(Request $request, film $film)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'language_id' => 'required',
            'rental_duration' => 'required',
            'rental_rate' => 'required',
            'length' => 'required',
            'replacement_cost' => 'required',
            'rating' => 'required',
            'special_features' => 'required',
        ]);
        $film->update($request->all());
        return redirect()->route('films.index');
    }
    public function destroy(film $film)
    {
        $film->delete();
        return redirect()->route('films.index');
    }
}
