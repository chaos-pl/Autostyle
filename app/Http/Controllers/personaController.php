<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class personaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido_paterno' => 'nullable|string|max:100',
        'apellido_materno' => 'nullable|string|max:100',
        'correo' => 'nullable|email|max:191',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tipo' => 'required|in:empleado,cliente,usuario',
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $data['foto'] = 'uploads/' . $filename;  // Guardar ruta relativa
    }

    Persona::create($data);

    return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido_paterno' => 'nullable|string|max:100',
        'apellido_materno' => 'nullable|string|max:100',
        'correo' => 'nullable|email|max:191',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // valida imagen opcional
        'tipo' => 'required|in:empleado,cliente,usuario',
    ]);

    $persona = Persona::findOrFail($id);

    // Si se subió archivo, guardarlo y actualizar la ruta
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $persona->foto = 'uploads/' . $filename;
    }

    // Actualiza los demás campos excepto la foto que ya manejamos
    $persona->nombre = $request->nombre;
    $persona->apellido_paterno = $request->apellido_paterno;
    $persona->apellido_materno = $request->apellido_materno;
    $persona->correo = $request->correo;
    $persona->tipo = $request->tipo;

    $persona->save();

    return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
