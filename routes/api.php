<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí registras las rutas para tu API. Estas rutas están cargadas por el
| RouteServiceProvider dentro del grupo de middleware "api".
|
*/

// Rutas RESTful para productos (index, show, store, update, destroy)
Route::apiResource('productos', ProductoController::class);

// Ruta protegida para obtener el usuario autenticado (si usas Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
