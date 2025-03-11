<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filmActor;
use App\Models\actor;
use App\Models\film;

class filmActorController extends Controller
{
    public function index()
    {
        $filmActors = filmActor::all();
        $actors = actor::all();
        $films = film::all();
        return view('filmActors.index', compact('filmActors', 'actors', 'films'));
    }
    public function create()
    {
        return view('filmActors.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required',
            'actor_id' => 'required',
        ]);
        filmActor::create($request->all());
        return redirect()->route('filmActors.index');
    }
    public function edit(filmActor $filmActor)
    {
        return view('filmActors.edit', compact('filmActor'));
    }
    public function update(Request $request, filmActor $filmActor)
    {
        $request->validate([
            'film_id' => 'required',
            'actor_id' => 'required',
        ]);
        $filmActor->update($request->all());
        return redirect()->route('filmActors.index');
    }
    public function destroy(filmActor $filmActor)
    {
        $filmActor->delete();
        return redirect()->route('filmActors.index');
    }
}
