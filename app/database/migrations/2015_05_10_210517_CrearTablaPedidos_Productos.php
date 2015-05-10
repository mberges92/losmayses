<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidosProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pedidos_productos', function($tabla)
        {
            $tabla->increments('id');
            $tabla->integer('pedido_id');          // id del pedido
            $tabla->integer('producto_id');           // id del producto
            $tabla->decimal('precioUnidad');
            $tabla->integer('cantidad');


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
        Schema::dropIfExists('pedidos_productos');
	}

}
