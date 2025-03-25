<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class actorController extends Controller
{
    public function index()
    {
        $actors = Actor::paginate(10);
        return view('actors.index', compact('actors'));
    }

    public function create()
    {
        return view('actors.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        Actor::create($request->all());
        return redirect()->route('actors.index')->with('success', 'Actor created successfully.');
    }
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }
    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $actor->update($request->all());
        return redirect()->route('actors.index')->with('warning', 'Actor updated successfully.');
    }
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('actors.index')->with('success', 'Actor deleted successfully.');
    }
}
