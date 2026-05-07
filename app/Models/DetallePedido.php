<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalles_pedidos';
    protected $primaryKey = 'id_detalle';
    public $timestamps = false;

    protected $fillable = [
        'id_solicitud',
        'id_servicio',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function solicitud()
    {
        return $this->belongsTo(SolicitudServicio::class, 'id_solicitud', 'id_solicitud');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }
}