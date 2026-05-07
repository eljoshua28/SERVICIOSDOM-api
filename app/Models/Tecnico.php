<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tecnico extends Model
{
    protected $table = 'tecnicos';

    protected $primaryKey = 'id_tecnico';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'telefono',
        'foto'
    ];
}
