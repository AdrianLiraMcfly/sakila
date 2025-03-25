<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    public function index()
    {
        $categories = category::paginate(10);
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        category::create($request->all());
        return redirect()->route('categories.index')->with('success','Category created successfully.');
    }
    public function edit(category $category)
    {
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('warning','Category updated successfully');
    }
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }
}
