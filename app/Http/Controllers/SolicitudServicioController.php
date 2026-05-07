<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudServicio;

class SolicitudServicioController extends Controller
{
    // Crear solicitud (cliente)
    public function crear(Request $request)
{
    $request->validate([
        'id_usuario' => 'required',
        'id_servicio' => 'required',
        'id_zona' => 'required',
        'domicilio' => 'required'
    ]);

    return SolicitudServicio::create([
        'id_usuario' => $request->id_usuario,
        'id_servicio' => $request->id_servicio,
        'id_zona' => $request->id_zona,
        'domicilio' => $request->domicilio,
        'estado' => 'pendiente',
        'costo_final' => $request->costo_final
    ]);
}

    // Asignar técnico (admin)
    public function asignarTecnico(Request $request, $id)
    {
        $solicitud = SolicitudServicio::findOrFail($id);

        $solicitud->update([
            'id_tecnico' => $request->id_tecnico,
            'estado' => 'en_proceso'
        ]);

        return $solicitud;
    }

    // Cambiar estado
    public function cambiarEstado(Request $request, $id)
    {
        $solicitud = SolicitudServicio::findOrFail($id);

        $solicitud->update([
            'estado' => $request->estado
        ]);

        return $solicitud;
    }

    // Finalizar servicio
    public function finalizar(Request $request, $id)
    {
        $solicitud = SolicitudServicio::findOrFail($id);

        $solicitud->update([
            'estado' => 'completado',
            'costo_final' => $request->costo_final,
            'fecha_cierre' => now()
        ]);

        return $solicitud;
    }

    // Ver solicitudes
   public function index()
{
    return SolicitudServicio::with([
        'usuario',
        'servicio',
        'zona',
        'tecnico' 
    ])->get();
}
public function show($id)
{
    return SolicitudServicio::with([
        'usuario',
        'servicio',
        'zona',
        'tecnico'
    ])->findOrFail($id);
}

// Ver solicitudes por usuario
public function porUsuario($id)
{
    return SolicitudServicio::with(['usuario', 'servicio', 'zona', 'tecnico'])
        ->where('id_usuario', $id)
        ->get();
}
public function destroy($id)
{
    $solicitud = SolicitudServicio::find($id);

    if (!$solicitud) {
        return response()->json([
            'mensaje' => 'Solicitud no encontrada'
        ], 404);
    }

    $solicitud->delete();

    return response()->json([
        'mensaje' => 'Solicitud eliminada correctamente'
    ]);
}

public function cancelar($id)
{
    $solicitud = SolicitudServicio::findOrFail($id);
    $solicitud->update(['estado' => 'cancelado']);
    return response()->json(['mensaje' => 'Solicitud cancelada']);
}

public function update(Request $request, $id)
{
    $solicitud = SolicitudServicio::findOrFail($id);
    $solicitud->update($request->all());
    return response()->json($solicitud);
}

}