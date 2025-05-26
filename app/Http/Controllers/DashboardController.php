<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Proveedor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();
        $totalClientes = Cliente::count();
        $totalEmpleados = Empleado::count();
        $totalProveedores = Proveedor::count();

        return view('dashboard', compact(
            'totalProductos',
            'totalClientes',
            'totalEmpleados',
            'totalProveedores'
        ));
    }
}
