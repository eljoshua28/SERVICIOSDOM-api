<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolAdmin;

class RolAdminController extends Controller
{
    // LISTAR TODOS
    public function index()
    {
        return RolAdmin::all();
    }

    // CREAR
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        return RolAdmin::create($request->all());
    }

    // MOSTRAR POR ID
    public function show($id)
    {
        return RolAdmin::findOrFail($id);
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $rol = RolAdmin::findOrFail($id);
        $rol->update($request->all());

        return $rol;
    }

    // ELIMINAR
    public function destroy($id)
    {
        RolAdmin::destroy($id);

        return response()->json([
            'mensaje' => 'Rol eliminado correctamente'
        ]);
    }
}
