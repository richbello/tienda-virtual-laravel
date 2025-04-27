<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas para tu aplicación web. Estas rutas son
| para manejo a través de los navegadores.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas RESTful para productos
Route::post('/productos', [ProductoController::class, 'store']); // Crear producto
Route::get('/productos', [ProductoController::class, 'index']); // Obtener todos los productos
Route::get('/productos/{id}', [ProductoController::class, 'show']); // Mostrar un producto por ID
Route::put('/productos/{id}', [ProductoController::class, 'update']); // Actualizar producto
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); // Eliminar producto

// Ruta pública para registrar usuarios (si usas autenticación)
Route::post('/register', [AuthController::class, 'register']);

// Ruta protegida para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
