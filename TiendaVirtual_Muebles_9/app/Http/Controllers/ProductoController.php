<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        return response()->json(Producto::all(), 200);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        $producto = Producto::create($request->all());

        return response()->json($producto, 201);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->update($request->all());

        return response()->json($producto, 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['mensaje' => 'Producto eliminado'], 200);
    }
}

