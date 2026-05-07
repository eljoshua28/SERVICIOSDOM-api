<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolAdmin extends Model
{
    protected $table = 'roles_admin';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];
}