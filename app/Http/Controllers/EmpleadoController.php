<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\persona;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empleados = Empleado::with('persona')->latest()->paginate(6);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $personas = Persona::all();
        return view('empleados.create', compact('personas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
        ]);

        Empleado::create([
            'persona_id' => $request->persona_id,
        ]);

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
        $personas = Persona::all();
        return view('empleados.edit', compact('empleado', 'personas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
        ]);

        $empleado->update([
            'persona_id' => $request->persona_id,
        ]);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
