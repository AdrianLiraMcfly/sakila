<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::paginate(10);
        return view('languages.index', compact('languages'));
    }
    public function create()
    {
        return view('languages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Language::create($request->all());
        return redirect()->route('languages.index')->with('success','Language created successfully.');
    }
    public function edit(Language $language)
    {
        $languages = Language::all();
        return view('languages.edit', compact('language', 'languages'));
    }
    
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $language->update($request->all());
        return redirect()->route('languages.index')->with('warning','Language updated successfully');
    }
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success','Language deleted successfully');
    }
}
