<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;

class AdministradorController extends Controller
{
    // LISTAR
    public function index()
    {
        return Administrador::all();
    }

    // CREAR
   public function store(Request $request)
{
    return Administrador::create($request->all());
}

    // MOSTRAR POR ID
    public function show($id)
    {
        return Administrador::findOrFail($id);
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $admin = Administrador::findOrFail($id);
        $admin->update($request->all());
        return $admin;
    }

    // ELIMINAR
    public function destroy($id)
    {
        Administrador::destroy($id);

        return response()->json([
            'mensaje' => 'Administrador eliminado'
        ]);
    }
}