<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController; // <-- ¡Agregado!

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rutas RESTful para productos
Route::apiResource('productos', ProductoController::class);

// Ruta pública para registrar usuarios
Route::post('/register', [AuthController::class, 'register']); // <-- ¡Agregado!

// Ruta protegida para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

