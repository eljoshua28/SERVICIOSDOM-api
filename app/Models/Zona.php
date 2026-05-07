<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zonas';
    protected $primaryKey = 'id_zona';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'recargo'
    ];
}
