<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;  // Asumiendo que tienes un modelo de carrito
use App\Models\Product;  // Modelo del producto

class CartController extends Controller
{
    // Método para agregar producto al carrito
    public function addToCart(Request $request)
    {
        // Validación de entrada
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Lógica para agregar el producto al carrito
        $cart = auth()->user()->cart()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => Product::find($request->product_id)->price,  // Obtener el precio directamente
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Producto agregado al carrito con éxito',
            'cart' => $cart
        ], 200);
    }

    // Método para eliminar producto del carrito
    public function removeFromCart($product_id)
    {
        // Obtener el carrito del usuario autenticado
        $cartItem = auth()->user()->cart()->where('product_id', $product_id)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Producto no encontrado en el carrito'], 404);
        }

        // Eliminar el producto del carrito
        $cartItem->delete();

        return response()->json(['message' => 'Producto eliminado del carrito'], 200);
    }
}


