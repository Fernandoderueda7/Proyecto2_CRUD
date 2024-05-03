<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Tienda;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function __construct()
    {
        $this -> middleware('auth');
    }

    public function index()
    {
        //
        $empleados = Empleado::all();
        return view('empleados.listado', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

    public function asignarTienda(Empleado $empleado)
    {
        return view('empleados.asignar-tienda', compact('empleado'))
            ->with('tiendas', Tienda::all());
    }

    public function relacionarTiendaConEmpleado (Request $request, Empleado $empleado)
    {
        $tienda_id = $request->tienda_id;
        $empleado_id = $empleado->id;

        $empleado->tiendas()->sync($tienda_id);

        return redirect()->route('empleado.show', $empleado_id);
    }
}
