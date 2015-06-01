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
            $tabla->string('cif');
            $tabla->string('telefono_1');         // Poner null manualmente
            $tabla->string('telefono_2');         // Poner null manualmente
            $tabla->string('correo');             //  Poner null manualmentes
            $tabla->string('provincia');
            $tabla->string('localidad');
            $tabla->string('cod_postal');
            $tabla->tinyInteger('activo');        // Poner limite de 1 caracter
            $tabla->tinyInteger('completo');
            $tabla->integer('usuario_id');        // foreign_key para los usuarios

            //$tabla->timestamps();
        });


        DB::table('tiendas')->insert(array(
                'nombre' => 'tiendaDePrueba',
                'direccion' => 'C/ Miguel Servet XX',
                'cif' => '123456789-10',
                'telefono_1' => '555555555',
                'telefono_2' => '777777777',
                'correo' => 'obrador@losmayses.com',
                'provincia' => 'Zaragoza',
                'localidad' => 'Zaragoza',
                'cod_postal' => '50007',
                'completo' => 1,
                'usuario_id' => 2,                  //COMPROBAR SI CORRESPONDE CON EL ID de usuario cliente
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
        Schema::dropIfExists('tiendas');
	}

}
