<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Servicio extends Model
{
    protected $table = 'servicios';

    protected $primaryKey = 'id_servicio';

    public $timestamps = false;

   protected $fillable = [
    'nombre',
    'descripcion',
    'costo_base',
    'imagen1',
    'imagen2',
    'imagen3'
];

}
