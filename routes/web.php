<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Ruta para la vista principal, puedes mantenerla o cambiarla si es necesario
Route::get('/', function () {
    return view('welcome');
});

// Rutas para productos
Route::get('/productos', [ProductoController::class, 'index']);    // Listar productos
Route::post('/productos', [ProductoController::class, 'store']);   // Crear un nuevo producto
Route::get('/productos/{id}', [ProductoController::class, 'show']); // Mostrar un producto específico
Route::put('/productos/{id}', [ProductoController::class, 'update']); // Actualizar un producto
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); // Eliminar un producto
