<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\film;
use App\Models\Language;
use App\Models\Category;

class filmController extends Controller
{
    public function index()
        {
            $films = Film::with(['category', 'language'])->paginate(10); // Cargar relaciones
            $languages = Language::all();
            $categories = Category::all();
            return view('films.index', compact('films', 'languages', 'categories'));
        }

    public function create()
    {
        $languages = Language::all();
        return view('films.create', compact('languages'));
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
        $languages = Language::all();
        return view('films.edit', compact('film', 'languages'));
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
