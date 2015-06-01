<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTarifas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tarifas', function($tabla)
        {
            $tabla->increments('id');
            $tabla->string('nombre');
            $tabla->string('signo');
            $tabla->integer('valor');           // PORCENTAJE INTEGER
            //$tabla->tinyInteger('activo');      // Poner limite de 1 caracter
            //$tabla->timestamps();
        });

        DB::table('tarifas')->insert(array(
                'nombre' => 'TARIFA1',
                'signo' => '+',
                'valor' => 50)
        );

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('tarifas');
	}

}
