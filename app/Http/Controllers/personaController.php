<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class personaController extends Controller
{

    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

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

    public function show(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    public function edit(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido_paterno' => 'nullable|string|max:100',
        'apellido_materno' => 'nullable|string|max:100',
        'correo' => 'nullable|email|max:191',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', opcional
        'tipo' => 'required|in:empleado,cliente,usuario',
    ]);

    $persona = Persona::findOrFail($id);

   
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $persona->foto = 'uploads/' . $filename;
    }

  
    $persona->nombre = $request->nombre;
    $persona->apellido_paterno = $request->apellido_paterno;
    $persona->apellido_materno = $request->apellido_materno;
    $persona->correo = $request->correo;
    $persona->tipo = $request->tipo;

    $persona->save();

    return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
}

    
    public function destroy(string $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
