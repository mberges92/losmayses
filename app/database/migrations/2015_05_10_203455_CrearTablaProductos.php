<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('productos', function($tabla)
        {
            $tabla->increments('id');
            $tabla->string('nombre');
            $tabla->decimal('precio_total');
            $tabla->integer('iva');
            $tabla->tinyInteger('activo');

            //$tabla->timestamps();
        });



        DB::table('productos')->insert(array(
                'nombre' => 'LECHUGA',
                'precio_total' => '1.30',
                'iva' => '4',
                'activo' => 1,

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
        Schema::dropIfExists('productos');
    }

}
