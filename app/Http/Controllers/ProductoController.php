<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth') -> except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('productos/productoIndex', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('productos.productoCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //Validacion
        $request -> validate([
            'nombre_producto' => 'required|max:255',
            'marca' => 'required',
            'descripcion' => ['required', 'min:10'],
            'precio' => ['required', 'decimal:0, 2' ],
            'categoria' => 'required',
            'deporte' => 'required',
            'estado' => 'required',
            'tienda' => 'required',


        ]);
    
        // //Guardar
        $producto = new Producto();
        $producto -> user_id = Auth::id();
        $producto -> nombre_producto = $request -> nombre_producto;
        $producto -> marca = $request -> marca;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> categoria = $request -> categoria;
        $producto -> deporte = $request -> deporte;
        $producto -> estado = $request -> estado;
        $producto -> tienda = $request -> tienda;
        $producto -> save();
    
        //Redireccionar
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        return view('productos.productoShow', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        return view('productos.productoEdit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
         //Validacion
         $request -> validate([
            'nombre_producto' => 'required|max:255',
            'marca' => 'required',
            'descripcion' => ['required', 'min:10'],
            'precio' => ['required', 'decimal:0, 2' ],
            'categoria' => 'required',
            'deporte' => 'required',
            'estado' => 'required',
            'tienda' => 'required',


        ]);
    
        $producto -> nombre_producto = $request -> nombre_producto;
        $producto -> marca = $request -> marca;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> categoria = $request -> categoria;
        $producto -> deporte = $request -> deporte;
        $producto -> estado = $request -> estado;
        $producto -> tienda = $request -> tienda;
        $producto -> save();
    
        //Redireccionar
        return redirect()->route('producto.show', $producto);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto -> delete();
        return redirect() -> route('producto.index');
    }
}
