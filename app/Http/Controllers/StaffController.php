<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importar Hash para hashear contraseñas
use App\Models\Staff;
use App\Models\Store;
use App\Models\Address;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::paginate(10);
        $stores = Store::all();
        $address = Address::all();
        return view('staffs.index', compact('staffs', 'address', 'stores'));
    }

    public function create()
    {
        $stores = Store::all();
        $addresses = Address::all();
        return view('staffs.create', compact('stores', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address_id' => 'required',
            'store_id' => 'required',
            'email' => 'required|email',
            'active' => 'required',
            'username' => 'required',
            'password' => 'required|min:8', // Validar longitud mínima de la contraseña
        ]);

        // Hashear la contraseña antes de guardar
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        Staff::create($data);

        return redirect()->route('staffs.index');
    }

    public function edit(Staff $staff)
    {
        $stores = Store::all();
        $addresses = Address::all();
        return view('staffs.edit', compact('staff', 'stores', 'addresses'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address_id' => 'required',
            'store_id' => 'required',
            'email' => 'required|email',
            'active' => 'required',
            'username' => 'required',
        ]);

        $data = $request->all();

        // Verificar si se envió una nueva contraseña y hashearla
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            // Si no se envió una nueva contraseña, eliminarla de los datos para evitar sobreescribir
            unset($data['password']);
        }

        $staff->update($data);

        return redirect()->route('staffs.index');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staffs.index');
    }
}