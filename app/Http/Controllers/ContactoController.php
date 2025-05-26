<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Mostrar listado de contactos.
     */
    public function index()
    {
        $contactos = Contacto::orderBy('fecha', 'desc')->get();
        return view('contactos.index', compact('contactos'));
    }

    /**
     * Mostrar formulario para crear nuevo contacto.
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Guardar un nuevo contacto.
     */
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

    /**
     * Mostrar un contacto específico.
     */
    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    /**
     * Mostrar formulario para editar un contacto.
     */
    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    /**
     * Actualizar un contacto.
     */
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

    /**
     * Eliminar un contacto (soft delete).
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado.');
    }
}
