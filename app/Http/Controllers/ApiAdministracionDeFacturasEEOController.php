<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ApiAdministracionDeFacturasEEOController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all();
        return response()->json($facturas);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Factura();
        $factura->fill($request->all());
        $factura->save();
        return response()->json($factura, 201);
    }


    /**
     * Display the specified resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $factura = Factura::findOrFail($id);
        return response()->json($factura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'idRegion' => 'required',
                'consumokwh' => 'required',
                'distribucion' => 'required',
                'tasaMunicipal' => 'required',
                'cargoPorMora' => 'required',
                'fechaCreacion' => 'required',
                'fechaVencimiento' => 'required',
                // otras reglas de validación aquí
            ]);

            $factura = Factura::findOrFail($id);
        $factura->fill($request->all());
        $factura->save();

        return response()->json($factura);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al actualizar la factura'], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return response()->json(null, 204);
    }
}