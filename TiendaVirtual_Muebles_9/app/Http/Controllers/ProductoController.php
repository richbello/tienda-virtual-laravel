<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return response()->json([
            'mensaje' => 'Productos listados exitosamente',
            'data' => $productos
        ], 200);
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return response()->json([
            'mensaje' => 'Producto creado exitosamente',
            'data' => $producto
        ], 201);
    }

    // Mostrar un solo producto
    public function show(Producto $producto)
    {
        return response()->json([
            'mensaje' => 'Producto encontrado exitosamente',
            'data' => $producto
        ], 200);
    }

    // Actualizar un producto existente
    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return response()->json([
            'mensaje' => 'Producto actualizado exitosamente',
            'data' => $producto
        ], 200);
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json([
            'mensaje' => 'Producto eliminado exitosamente'
        ], 204);
    }

    // Estos métodos no se usan en APIs REST, pero los dejamos vacíos
    public function create() {}
    public function edit(Producto $producto) {}
}
