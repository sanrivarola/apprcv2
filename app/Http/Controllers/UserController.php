<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Obtener usuarios ordenados por nombre ascendente
        $users = User::orderBy('name', 'asc')->paginate(25);

        return view('usuarios.index', compact('users'));
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Estado de usuario actualizado.');
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'required|in:admin,editor',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['active']   = true;

        User::create($data);

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // opcional, solo si se cambia
            'role'     => 'required|in:admin,editor',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // no actualizar si está vacío
        }

        $user->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }
}
