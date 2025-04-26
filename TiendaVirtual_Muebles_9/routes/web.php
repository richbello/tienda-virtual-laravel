<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Http\JsonResponse;

class ProductoController extends Controller
{
    // Método para guardar un nuevo producto
    public function guardar(Request $request): JsonResponse
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->save();

            return response()->json([
                'message' => 'Producto creado exitosamente',
                'producto' => $producto,
            ], 201); // Código 201 = creado exitosamente
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No se pudo guardar el producto',
                'detalles' => $e->getMessage()
            ], 500); // Error del servidor
        }
    }

    // Método para mostrar un producto por ID
    public function mostrar($id): JsonResponse
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'error' => 'Producto no encontrado',
            ], 404);
        }

        return response()->json($producto, 200);
    }

    // Método para eliminar un producto por ID
    public function eliminar($id): JsonResponse
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'error' => 'Producto no encontrado',
            ], 404);
        }

        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente',
        ], 200);
    }
}
