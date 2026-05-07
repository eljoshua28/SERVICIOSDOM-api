<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Servicio;

class DetallePedidoController extends Controller
{
    // LISTAR DETALLES POR SOLICITUD
   public function porSolicitud($id)
{
    $detalles = DetallePedido::with('servicio')
        ->where('id_solicitud', $id)
        ->get();

    $solicitud = \App\Models\SolicitudServicio::with('zona')
        ->find($id);

    return response()->json([
        'detalles' => $detalles,
        'zona' => $solicitud ? $solicitud->zona : null
    ]);
}

    // CREAR DETALLE
    public function store(Request $request)
{
    try {
        $request->validate([
            'id_solicitud' => 'required|integer',
            'id_servicio' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $detalle = DetallePedido::create($request->all());
        return response()->json($detalle, 201);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    // ELIMINAR DETALLE
    public function destroy($id)
    {
        DetallePedido::destroy($id);
        return response()->json(['mensaje' => 'Detalle eliminado']);
    }
}