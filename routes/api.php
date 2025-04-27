<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------|
| API Routes                                                                |
|--------------------------------------------------------------------------|
*/

// Rutas RESTful para productos
Route::prefix('productos')->group(function () {
    Route::post('/', [ProductoController::class, 'store']);  // Crear un producto
    Route::get('/', [ProductoController::class, 'index']);  // Obtener todos los productos
    Route::get('/{id}', [ProductoController::class, 'show']);  // Obtener un producto por ID
    Route::put('/{id}', [ProductoController::class, 'update']);  // Actualizar un producto
    Route::delete('/{id}', [ProductoController::class, 'destroy']);  // Eliminar un producto
});

// Ruta pública para registrar usuarios
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    // Carrito
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::delete('/cart/remove/{product_id}', [CartController::class, 'removeFromCart']);

    // Obtener usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
