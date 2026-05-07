<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        return response()->json(Servicio::all());
    }

    public function store(Request $request)
    {
        $data = $request->except(['imagen1', 'imagen2', 'imagen3']);

        foreach (['imagen1', 'imagen2', 'imagen3'] as $campo) {
            if ($request->hasFile($campo)) {
                $data[$campo] = $request->file($campo)->store('servicios', 'public');
            }
        }

        $servicio = Servicio::create($data);
        return response()->json($servicio, 201);
    }

    public function show(string $id)
    {
        return response()->json(Servicio::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $servicio = Servicio::findOrFail($id);
        $data = $request->except(['imagen1', 'imagen2', 'imagen3']);

        foreach (['imagen1', 'imagen2', 'imagen3'] as $campo) {
            if ($request->hasFile($campo)) {
                $data[$campo] = $request->file($campo)->store('servicios', 'public');
            }
        }

        $servicio->update($data);
        return response()->json($servicio);
    }

    public function destroy(string $id)
    {
        Servicio::destroy($id);
        return response()->json([
            "mensaje" => "Servicio eliminado correctamente"
        ]);
    }
}
