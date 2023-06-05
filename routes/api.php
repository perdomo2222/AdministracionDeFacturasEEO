<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAdministracionDeFacturasEEOController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});


Route::get('/facturas', [ApiAdministracionDeFacturasEEOController::class, 'index']);
Route::post('/facturas', [ApiAdministracionDeFacturasEEOController::class, 'store']);
Route::get('/facturas/{id_factura}', [ApiAdministracionDeFacturasEEOController::class, 'show']);
Route::put('/facturas/{id_factura}', [ApiAdministracionDeFacturasEEOController::class, 'update']);
Route::delete('/facturas/{id_factura}', [ApiAdministracionDeFacturasEEOController::class, 'destroy']);