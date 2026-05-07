<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    protected $table = 'solicitudes_servicio';
    protected $primaryKey = 'id_solicitud';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_servicio',
        'id_zona',
        'id_tecnico',
        'domicilio',
        'estado',
        'costo_final',
        'fecha_solicitud',
        'fecha_cierre',
        'numero_transaccion'
    ];
    public function usuario()
{
    return $this->belongsTo(Usuario::class, 'id_usuario');
}

public function servicio()
{
    return $this->belongsTo(Servicio::class, 'id_servicio');
}

public function zona()
{
    return $this->belongsTo(Zona::class, 'id_zona');
}
public function tecnico()
{
    return $this->belongsTo(Tecnico::class, 'id_tecnico');
}
}
