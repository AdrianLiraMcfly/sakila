<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filmCategory;
use App\Models\category;
use App\Models\film;

class filmCategoryController extends Controller
{
    public function index()
    {
        $filmCategories = filmCategory::all();
        $categories = category::all();
        $films = film::all();
        return view('filmCategories.index', compact('filmCategories', 'categories', 'films'));
    }
    public function create()
    {
        return view('filmCategories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required',
            'category_id' => 'required',
        ]);
        filmCategory::create($request->all());
        return redirect()->route('filmCategories.index');
    }
    public function edit(filmCategory $filmCategory)
    {
        return view('filmCategories.edit', compact('filmCategory'));
    }
    public function update(Request $request, filmCategory $filmCategory)
    {
        $request->validate([
            'film_id' => 'required',
            'category_id' => 'required',
        ]);
        $filmCategory->update($request->all());
        return redirect()->route('filmCategories.index');
    }
    public function destroy(filmCategory $filmCategory)
    {
        $filmCategory->delete();
        return redirect()->route('filmCategories.index');
    }
}
