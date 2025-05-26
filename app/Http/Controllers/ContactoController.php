<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::orderBy('fecha', 'desc')->get();
        return view('contactos.index', compact('contactos'));
    }

    public function create()
    {
        return view('contactos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'telefono' => 'nullable|string|max:50',
            'mensaje' => 'required|string',
        ]);

        Contacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
            'fecha' => now(),
        ]);

        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'nombre' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'telefono' => 'nullable|string|max:50',
            'mensaje' => 'required|string',
        ]);

        $contacto->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado correctamente.');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado.');
    }
}
