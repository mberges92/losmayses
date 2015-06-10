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
        Schema::create('detalles_pedidos', function($tabla)
        {
            $tabla->increments('id');
            $tabla->integer('pedido_id');          // id del pedido
            $tabla->integer('producto_id');           // id del producto
            $tabla->decimal('precioUnidad');
            $tabla->integer('cantidad');
            $tabla->integer('iva');
            $tabla->string('nombre_producto');
            //$tabla->string(''); // Nombre pedido¿?


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
        Schema::dropIfExists('detalles_pedidos');
	}

}
