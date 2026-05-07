<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    // LISTAR TODAS
    public function index()
    {
        return Zona::all();
    }

    // CREAR
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'recargo' => 'required|numeric'
        ]);

        return Zona::create($request->all());
    }

    // MOSTRAR POR ID
    public function show($id)
    {
        return Zona::findOrFail($id);
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $zona = Zona::findOrFail($id);
        $zona->update($request->all());

        return $zona;
    }

    // ELIMINAR
    public function destroy($id)
    {
        Zona::destroy($id);

        return response()->json([
            'mensaje' => 'Zona eliminada correctamente'
        ]);
    }
}