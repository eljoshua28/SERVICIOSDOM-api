<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ROLES_ADMIN
        |--------------------------------------------------------------------------
        */
        Schema::create('roles_admin', function (Blueprint $table) {
            $table->id('id_rol');
            $table->string('nombre', 50);
        });

        /*
        |--------------------------------------------------------------------------
        | ADMINISTRADORES
        |--------------------------------------------------------------------------
        */
        Schema::create('administradores', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('password', 255);
            $table->unsignedBigInteger('id_rol');

            $table->foreign('id_rol')
                  ->references('id_rol')
                  ->on('roles_admin');
        });

        /*
        |--------------------------------------------------------------------------
        | USUARIOS
        |--------------------------------------------------------------------------
        */
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('password', 255);
            $table->string('telefono', 20)->nullable();
        });

        /*
        |--------------------------------------------------------------------------
        | SERVICIOS
        |--------------------------------------------------------------------------
        */
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_servicio');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('costo_base', 8, 2);
        });

        /*
        |--------------------------------------------------------------------------
        | ZONAS
        |--------------------------------------------------------------------------
        */
        Schema::create('zonas', function (Blueprint $table) {
            $table->id('id_zona');
            $table->string('nombre', 50);
            $table->decimal('recargo', 8, 2);
        });

        /*
        |--------------------------------------------------------------------------
        | TECNICOS
        |--------------------------------------------------------------------------
        */
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id('id_tecnico');
            $table->string('nombre', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('foto', 255)->nullable();
        });

        /*
        |--------------------------------------------------------------------------
        | SOLICITUDES_SERVICIO
        |--------------------------------------------------------------------------
        */
        Schema::create('solicitudes_servicio', function (Blueprint $table) {
            $table->id('id_solicitud');

            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_zona');
            $table->unsignedBigInteger('id_tecnico')->nullable();

            $table->text('domicilio');
            $table->enum('estado', [
                'pendiente',
                'en_proceso',
                'en_camino',
                'completado',
                'cancelado'
            ])->default('pendiente');

            $table->decimal('costo_final', 8, 2)->nullable();
            $table->dateTime('fecha_solicitud')->useCurrent();
            $table->dateTime('fecha_cierre')->nullable();

            $table->foreign('id_usuario')
                  ->references('id_usuario')
                  ->on('usuarios');

            $table->foreign('id_servicio')
                  ->references('id_servicio')
                  ->on('servicios');

            $table->foreign('id_zona')
                  ->references('id_zona')
                  ->on('zonas');

            $table->foreign('id_tecnico')
                  ->references('id_tecnico')
                  ->on('tecnicos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes_servicio');
        Schema::dropIfExists('tecnicos');
        Schema::dropIfExists('zonas');
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('administradores');
        Schema::dropIfExists('roles_admin');
    }
};
