<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    protected $primaryKey = 'id_admin';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'id_rol'
    ];
}