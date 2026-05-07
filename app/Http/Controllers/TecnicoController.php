<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    // LISTAR TODOS LOS TECNICOS
    public function index()
    {
        return response()->json(Tecnico::all());
    }

    // CREAR TECNICO
    public function store(Request $request)
    {
        $tecnico = Tecnico::create($request->all());
        return response()->json($tecnico, 201);
    }

    // MOSTRAR TECNICO POR ID
    public function show(string $id)
    {
        return response()->json(Tecnico::findOrFail($id));
    }

    // ACTUALIZAR TECNICO
    public function update(Request $request, string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->update($request->all());

        return response()->json($tecnico);
    }

    // ELIMINAR TECNICO
    public function destroy(string $id)
    {
        Tecnico::destroy($id);
        return response()->json([
            "mensaje" => "Tecnico eliminado correctamente"
        ]);
    }
}