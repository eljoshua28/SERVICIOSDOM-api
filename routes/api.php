<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\RolAdminController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\SolicitudServicioController;
use App\Http\Controllers\DetallePedidoController;



/*
|--------------------------------------------------------------------------
| RUTAS PUBLICAS (SIN TOKEN)
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::get('/servicios', [ServicioController::class, 'index']);
Route::post('/servicios', [ServicioController::class, 'store']);
Route::get('/servicios/{id}', [ServicioController::class, 'show']);
Route::put('/servicios/{id}', [ServicioController::class, 'update']);
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy']);

Route::get('/administradores', [AdministradorController::class, 'index']);
Route::post('/administradores', [AdministradorController::class, 'store']);
Route::get('/administradores/{id}', [AdministradorController::class, 'show']);
Route::put('/administradores/{id}', [AdministradorController::class, 'update']);
Route::delete('/administradores/{id}', [AdministradorController::class, 'destroy']);

Route::get('/roles_admin', [RolAdminController::class, 'index']);
Route::post('/roles_admin', [RolAdminController::class, 'store']);
Route::get('/roles_admin/{id}', [RolAdminController::class, 'show']);
Route::put('/roles_admin/{id}', [RolAdminController::class, 'update']);
Route::delete('/roles_admin/{id}', [RolAdminController::class, 'destroy']);

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

Route::get('/tecnicos', [TecnicoController::class, 'index']);
Route::post('/tecnicos', [TecnicoController::class, 'store']);
Route::get('/tecnicos/{id}', [TecnicoController::class, 'show']);
Route::put('/tecnicos/{id}', [TecnicoController::class, 'update']);
Route::delete('/tecnicos/{id}', [TecnicoController::class, 'destroy']);

Route::get('/zonas', [ZonaController::class, 'index']);
Route::post('/zonas', [ZonaController::class, 'store']);
Route::get('/zonas/{id}', [ZonaController::class, 'show']);
Route::put('/zonas/{id}', [ZonaController::class, 'update']);
Route::delete('/zonas/{id}', [ZonaController::class, 'destroy']);

Route::get('/solicitudes', [SolicitudServicioController::class,'index']);
Route::post('/solicitudes', [SolicitudServicioController::class,'crear']);
Route::put('/solicitudes/{id}/asignar', [SolicitudServicioController::class,'asignarTecnico']);
Route::put('/solicitudes/{id}/estado', [SolicitudServicioController::class,'cambiarEstado']);
Route::put('/solicitudes/{id}/finalizar', [SolicitudServicioController::class,'finalizar']);
Route::get('/solicitudes/{id}', [SolicitudServicioController::class, 'show']);
Route::delete('/solicitudes/{id}', [SolicitudServicioController::class, 'destroy']);
Route::put('/solicitudes/{id}', [SolicitudServicioController::class, 'update']);

Route::get('/solicitudes/{id}/detalles', [DetallePedidoController::class, 'porSolicitud']);
Route::post('/detalles_pedidos', [DetallePedidoController::class, 'store']);
Route::delete('/detalles_pedidos/{id}', [DetallePedidoController::class, 'destroy']);

Route::get('/usuarios/{id}/solicitudes', [SolicitudServicioController::class, 'porUsuario']);
Route::put('/solicitudes/{id}/cancelar', [SolicitudServicioController::class, 'cancelar']);

Route::post('/login', [App\Http\Controllers\UsuarioController::class, 'login']);




/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (REQUIEREN TOKEN SANCTUM)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // obtener usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // logout
    Route::post('/logout', [AuthController::class,'logout']);

    /*
    ========================
    USUARIOS
    ========================
    */
    
    /*
    ========================
    SERVICIOS
    ========================
    */
    


    /*
    ========================
    TECNICOS
    ========================
    */
   

    /*
    ========================
    ADMINISTRADORES
    ========================
    */
    
    /*
    ========================
    ROLES ADMIN
    ========================
    */
    

    /*
    ========================
    ZONAS
    ========================
    */
    

    /*
    ========================
    SOLICITUDES DE SERVICIO
    ========================
    */
   

});