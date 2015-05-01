<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTiendas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tiendas', function($tabla)
        {
            $tabla->increments('id');
            $tabla->string('nombre');
            $tabla->string('direccion');
            $tabla->string('telefono_1');
            $tabla->string('telefono_2');
            $tabla->string('provincia');
            $tabla->string('localidad');
            $tabla->string('cod_postal');
            $tabla->tinyInteger('activo');  // Lo crea con 4 espacios
            $tabla->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('tiendas');
	}

}
