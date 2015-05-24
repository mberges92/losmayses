<?php


class TiendasController extends BaseController {


    // CONTROLADORES CLIENTE //////////////////////////////////////////////////////////////////////////////// ->
    public function tiendas_usuario($id)
    {

        $tiendas = Tienda::where('usuario_id','=', $id)->get()->toArray();
        //dd($tiendas);

        return View::make('cliente.tiendas')->with('tiendas', $tiendas);
    }

    public function nueva_tienda()
    {
        //dd(Input::all());
        $idUsuario = Auth::user()->id;


        $tienda = new Tienda();

        $tienda->nombre = Input::get('nombre');
        $tienda->activo = 0;
        $tienda->usuario_id = $idUsuario;

        $tienda->save();

        return Redirect::to('/cliente/'.$idUsuario.'/tiendas/'.$tienda->id);

    }


    public function modificar_tienda($id_usuario, $id_tienda)
    {
        $tienda = Tienda::find($id_tienda);

        if (Request::isMethod('post')) {

            $tienda->nombre = Input::get('nombre');
            $tienda->direccion = Input::get('direccion');
            $tienda->cif = Input::get('cif');
            $tienda->telefono_1 = Input::get('telefono_1');
            $tienda->telefono_2 = Input::get('telefono_2');
            $tienda->correo = Input::get('correo');
            $tienda->provincia = Input::get('provincia');
            $tienda->localidad = Input::get('localidad');
            $tienda->cod_postal = Input::get('cod_postal');

            $tienda->activo = 1; // Aqui un if, si los campos requeridos estan, activar

            $tienda->save();

            return Redirect::to('/cliente/'.$id_usuario.'/tiendas');


        }

        return View::make('cliente.tienda_editar')->with('tienda', $tienda);

    }


    public function eliminar_tienda($id_usuario, $id_tienda)
    {
        $tienda = Tienda::find($id_tienda);
        $tienda->delete();

        return Redirect::to('/cliente/'.$id_usuario.'/tiendas');

    }
    // FIN CONTROLADORES CLIENTE //////////////////////////////////////////////////////////////////////////// ->

    //
    //
    //
    //
    //
    //

    // CONTROLADORES ADMINISTRACION //////////////////////////////////////////////////////////////////////////////// ->
    public function listado()
    {
        $tiendas = Tienda::all();

        return View::make('admin.tiendas')->with('tiendas', $tiendas);

    }

    public function nueva()
    {

        if (Request::isMethod('post')) {

            //dd(Input::all());

            $tienda = new Tienda();

            $tienda->nombre = Input::get('nombre');
            $tienda->direccion = Input::get('direccion');
            $tienda->cif = Input::get('cif');
            $tienda->telefono_1 = Input::get('telefono_1');
            $tienda->telefono_2 = Input::get('telefono_2');
            $tienda->correo = Input::get('correo');
            $tienda->provincia = Input::get('provincia');
            $tienda->localidad = Input::get('localidad');
            $tienda->cod_postal = Input::get('cod_postal');

            $tienda->save();

            return Redirect::to('/admin/tiendas');

        }
    }

    public function modificar($id)
    {
        //DE MOMENTO SIN USO, CARACTERISTICA PARA ADMINISTRADOR NO IMPLEMENTADA

    }


    public function eliminar($id)
    {
        $tienda = Tienda::find($id);
        $tienda->delete();

        return Redirect::to('/admin/tiendas');
    }
    // FIN CONTROLADORES ADMINISTRACION //////////////////////////////////////////////////////////////////////////// ->

}