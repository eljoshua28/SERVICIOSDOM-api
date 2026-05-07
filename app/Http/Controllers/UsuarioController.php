<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        return Usuario::create($request->all());
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }
public function update(Request $request, $id)
{
    $usuario = Usuario::findOrFail($id);

    $usuario->nombre = $request->nombre;
    $usuario->correo = $request->correo;
    $usuario->telefono = $request->telefono;

    // 👇 SOLO SI VIENE PASSWORD
    if ($request->password) {
        $usuario->password = bcrypt($request->password);
    }

    $usuario->save();

    return response()->json([
        'mensaje' => 'Usuario actualizado'
    ]);
}

    public function destroy($id)
    {
       $usuario = Usuario::findOrFail($id);
    $usuario->delete();

        return response()->json(['mensaje'=>'Usuario eliminado']);
    }

    public function login(Request $request)
{
    $usuario = \App\Models\Usuario::where('correo', $request->correo)->first();

    if (!$usuario) {
        return response()->json(['error' => 'Credenciales incorrectas'], 401);
    }

    $passwordValido = false;
    try {
        $passwordValido = \Illuminate\Support\Facades\Hash::check($request->password, $usuario->password);
    } catch (\Exception $e) {
        $passwordValido = ($request->password === $usuario->password);
    }

    if (!$passwordValido) {
        return response()->json(['error' => 'Credenciales incorrectas'], 401);
    }

    return response()->json($usuario);
}

}
