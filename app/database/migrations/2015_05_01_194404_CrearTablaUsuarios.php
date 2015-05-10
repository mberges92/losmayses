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
            $tabla->string('username');
            $tabla->string('password');
            $tabla->string('correo');
            $tabla->string('rol');
            $tabla->tinyInteger('activo');  // Lo crea con 4 espacios
            $tabla->timestamps();
            $tabla->rememberToken();
        });

        // Voy a crear un usuario por defecto para loguearme
        DB::table('usuarios')->insert(array(
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'correo' => 'admin@admin.com',
                'rol' => 'Admin',
                'activo' => 1
            )
        );

        DB::table('usuarios')->insert(array(
                'username' => 'cliente',
                'password' => Hash::make('cliente'),
                'correo' => 'cliente@cliente.com',
                'rol' => 'Cliente',
                'activo' => 1
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
