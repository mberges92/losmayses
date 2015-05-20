<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pedidos', function($tabla)
        {
            $tabla->increments('id');               // id del pedido
            $tabla->integer('usuario_id');          // id del cliente que hace el encargo
            $tabla->integer('tienda_id');           // id de la tienda que se enviara el pedido
            $tabla->date('fechaPedido');
            $tabla->date('fechaEntrega');
            $tabla->tinyInteger('estado');          // Lo usare para ver el estado del pedido

            //$tabla->decimal('precio_pedido');    // Quizas un campo de precio final, o obtenerlo en una consulta
            //$tabla->timestamps();
        });





/*
        DB::table('pedidos')->insert(array(
                'nombre' => '',
                'pvp' => ,
                'activo' => 1
            )
        );
*/

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('pedidos');
	}

}
