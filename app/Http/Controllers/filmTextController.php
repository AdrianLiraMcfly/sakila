<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filmText;
use App\Models\film;

class filmTextController extends Controller
{
    public function index()
    {
        $filmTexts = filmText::all();
        $films = film::all();
        return view('filmTexts.index', compact('filmTexts', 'films'));
    }
    public function create()
    {
        return view('filmTexts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        filmText::create($request->all());
        return redirect()->route('filmTexts.index');
    }
    public function edit(filmText $filmText)
    {
        return view('filmTexts.edit', compact('filmText'));
    }
    public function update(Request $request, filmText $filmText)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $filmText->update($request->all());
        return redirect()->route('filmTexts.index');
    }
    public function destroy(filmText $filmText)
    {
        $filmText->delete();
        return redirect()->route('filmTexts.index');
    }
}
