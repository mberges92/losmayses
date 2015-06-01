<?php


class TiendasController extends BaseController {


    public function comprobar_tienda_nuevaTienda($id_usuario)
    {


        $t = Input::get('nombre');

        $esta = 'true';

        $busca_tienda = Tienda::where('nombre', '=', $t)->where('usuario_id', '=', $id_usuario)->get();

        if ($busca_tienda->count()) {
            $esta = 'false';

        } else {
            $esta = 'true';
        }

        echo $esta;


    }

    public function comprobar_tienda_existente($id_tienda) {

        if(Request::ajax()) {
            $m = Input::get('nombre');

            $esta = 'true';

            //$user = Usuario::where('correo', '=', $m)->get();
            $tienda = Tienda::where('nombre', '=', $m)->whereNotIn( 'id', [$id_tienda])->get();

            if($tienda->count()) {
                $esta = 'false';
                //return 'true';
                //return Response::json(array('msg' => 'true'));
            } else {
                $esta = 'true';

                //return 'false';
                //return Response::json(array('msg' => 'false'));
            }

            echo $esta;
        }

    }


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
        $tienda->completo = 0;

        $tienda->save();

        return Redirect::to('/cliente/'.$idUsuario.'/tiendas/'.$tienda->id);

    }


    public function modificar_tienda($id_usuario, $id_tienda)
    {
        $tienda = Tienda::find($id_tienda);

        if (Request::isMethod('post')) {

            $rules = array(
                'nombre' => 'required|between:1,255',
                'direccion' => 'required|between:1,255',
                'cod_postal' => 'required|digits:5|integer',
                'telefono_1' => array('required','numeric','digits_between:9,14'),
                'telefono_2' => array('numeric','digits_between:9,14'),
                'provincia' => 'required|between:1,255',
                'localidad' => 'required|between:1,255',
                'correo' => 'required|email|between:1,255|unique:tiendas,correo,'.Auth::user()->id
                );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                // No ha pasado la validacion

            } else {


                $tienda->nombre = Input::get('nombre');
                $tienda->direccion = Input::get('direccion');
                $tienda->cif = Input::get('cif');
                $tienda->telefono_1 = Input::get('telefono_1');
                $tienda->telefono_2 = Input::get('telefono_2');
                $tienda->correo = Input::get('correo');
                $tienda->provincia = Input::get('provincia');
                $tienda->localidad = Input::get('localidad');
                $tienda->cod_postal = Input::get('cod_postal');
                $tienda->completo = 1;

                $tienda->activo = 1;

                $tienda->save();

                return Redirect::to('/cliente/' . $id_usuario . '/tiendas');
            }

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



    public function eliminar($id)
    {
        $tienda = Tienda::find($id);
        $tienda->delete();

        return Redirect::to('/admin/tiendas');
    }
    // FIN CONTROLADORES ADMINISTRACION //////////////////////////////////////////////////////////////////////////// ->

}