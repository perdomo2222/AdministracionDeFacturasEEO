<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/facturas', [ApiAdministracionDeFacturasEEOController::class, 'index']);
Route::post('/facturas', [ApiAdministracionDeFacturasEEOController::class, 'store']);
Route::get('/facturas/{id}', [ApiAdministracionDeFacturasEEOController::class, 'show']);
Route::put('/facturas/{id}', [ApiAdministracionDeFacturasEEOController::class, 'update']);
Route::delete('/facturas/{id}', [ApiAdministracionDeFacturasEEOController::class, 'destroy']);
