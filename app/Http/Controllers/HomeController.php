<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Proveedor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empleados = Empleado::with('persona')->get();
        $totalProductos = Producto::count();
        $totalClientes = Cliente::count();
        $totalEmpleados = Empleado::count();
        $totalProveedores = Proveedor::count();

        return view('home', compact('totalProductos', 'totalClientes', 'totalEmpleados', 'totalProveedores', 'empleados'));
    }
}
