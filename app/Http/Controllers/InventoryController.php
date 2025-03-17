<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Store;
use App\Models\Film;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::paginate(10);
        $stores = Store::all();
        $films = Film::all();
        return view('inventories.index', compact('inventories', 'stores', 'films'));
    }
    public function create()
    {
        $stores = Store::all();
        $films = Film::all();
        return view('inventories.create', compact('stores', 'films'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required',
            'film_id' => 'required',
        ]);
        Inventory::create($request->all());
        return redirect()->route('inventories.index');
    }
    public function edit(Inventory $inventory)
    {
        $stores = Store::all();
        $films = Film::all();
        return view('inventories.edit', compact('inventory', 'stores', 'films'));
    }
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'store_id' => 'required',
            'film_id' => 'required',
        ]);
        $inventory->update($request->all());
        return redirect()->route('inventories.index');
    }
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index');
    }
}
