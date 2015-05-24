<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategoriasProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('categorias_productos', function($tabla)
        {
            $tabla->increments('id');
            $tabla->integer('categoria_id');          // id de categoria
            $tabla->integer('producto_id');           // id del producto

            //$tabla->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('categorias_productos');
	}

}
