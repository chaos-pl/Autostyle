<?php

namespace App\Http\Controllers;

use App\Models\ProductoProveedor;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relaciones = ProductoProveedor::with('producto', 'proveedor')->get();
        return view('producto_proveedor.index', compact('relaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('producto_proveedor.create', compact('productos', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
        ]);

        ProductoProveedor::create([
            'producto_id' => $request->producto_id,
            'proveedor_id' => $request->proveedor_id,
        ]);

        return redirect()->route('producto_proveedor.index')->with('success', 'Relación creada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoProveedor $productoProveedor)
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('producto_proveedor.edit', compact('productoProveedor', 'productos', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductoProveedor $productoProveedor)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
        ]);

        $productoProveedor->update([
            'producto_id' => $request->producto_id,
            'proveedor_id' => $request->proveedor_id,
        ]);

        return redirect()->route('producto_proveedor.index')->with('success', 'Relación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductoProveedor $productoProveedor)
    {
        $productoProveedor->delete();
        return redirect()->route('producto_proveedor.index')->with('success', 'Relación eliminada correctamente.');
    }
}
