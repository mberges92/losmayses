<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategorias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('categorias', function($tabla)
        {
            $tabla->increments('id');
            $tabla->string('nombre');
            $tabla->tinyInteger('activo');

            //$tabla->timestamps();
        });


        DB::table('categorias')->insert(array(
                'nombre' => 'CATEGORIA-1',
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
        Schema::dropIfExists('categorias');
	}

}
