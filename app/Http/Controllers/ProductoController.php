<?php

namespace App\Http\Controllers;

use App\Models\Producto;  // Asegúrate de que el modelo Producto esté correctamente importado
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Método para almacenar productos
    public function store(Request $request)
    {
        // Validación básica de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        // Crear el nuevo producto
        $producto = Producto::create([
            'nombre' => $validated['nombre'],
            'precio' => $validated['precio'],
        ]);

        // Retornar una respuesta
        return response()->json($producto, 201);
    }
}
