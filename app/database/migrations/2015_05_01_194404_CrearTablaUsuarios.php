<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function($tabla)
        {
            $tabla->increments('id');
            $tabla->string('correo'); //OBLIGATORIO
            $tabla->string('password'); //OBLIGATORIO
            $tabla->string('rol'); //OBLIGATORIO
            $tabla->tinyInteger('activo');  // Lo crea con 4 espacios

            $tabla->string('nombre_contacto');
            $tabla->string('direccion');
            $tabla->string('telefono1');
            $tabla->string('telefono2');
            $tabla->string('codigo_postal');
            $tabla->tinyInteger('completo');
            $tabla->string('nombre_empresa');

            $tabla->integer('tarifa_id');

            $tabla->timestamps();
            $tabla->rememberToken();
        });

        // Voy a crear un usuario por defecto para loguearme
        DB::table('usuarios')->insert(array(
                'correo' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'rol' => 'doble',
                'activo' => 1,
                'nombre_contacto' => 'Administrador',
                'direccion' => 'C/ Miguel Servet XX',
                'telefono1' => '976123123',
                'telefono2' => '654778899',
                'codigo_postal' => '50008',
                'completo' => 1,
                'nombre_empresa' => 'Los Mayses',
                'tarifa_id' => 1
            )
        );

        DB::table('usuarios')->insert(array(
                'correo' => 'cliente@cliente.com',
                'password' => Hash::make('cliente'),
                'rol' => 'cliente',
                'activo' => 1,
                'nombre_contacto' => 'Cliente 1',
                'direccion' => 'C/ KKKKKKKKKK',
                'telefono1' => '976123123',
                'telefono2' => '654778899',
                'codigo_postal' => '50007',
                'completo' => 1,
                'nombre_empresa' => 'PANICHOP',
                'tarifa_id' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }


}
