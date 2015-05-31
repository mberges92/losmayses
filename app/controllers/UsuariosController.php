<?php


class UsuariosController extends BaseController {


    public function activar_ajax($usuario_id=null, $valor=null)
    {

        if(Request::ajax()) {
            if(!$usuario_id ){
                return 0;
            }

            $usu_id = Usuario::find($usuario_id);

            if ($valor == "1") {
                $usu_id->activo = 0;
                $usu_id->save();
                $valor = "0";
            } elseif ($valor == "0") {
                $usu_id->activo = 1;
                $usu_id->save();
                $valor = "1";
            }


            $data = array('estado' => $valor,
                'id' => $usuario_id,
                'field' => 'activo');

            return Response::json($data);

        }

    }




    public function comprobar_email_existente($id_usuario) {

        if(Request::ajax()) {
            $m = Input::get('correo');

            $esta = 'true';

            //$user = Usuario::where('correo', '=', $m)->get();
            $user = Usuario::where('correo', '=', $m)->whereNotIn( 'id', [$id_usuario])->get();

            if($user->count()) {
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



    // PARTE CLIENTE //////////////////////////////////////////////////////////////////////////// ->
    public function datos_cliente($id)
    {

        $cliente = Usuario::find($id);

        if (Request::isMethod('post')) {


            $rules = array(
                'correo' => 'required|email|between:1,255|unique:usuarios,correo,'.Auth::user()->id,
                'password' => 'alpha_num|between:1,255',
                'nombre_empresa' => 'required|between:1,255',
                'nombre_contacto' => 'required|between:1,255',
                'direccion' => 'required|between:1,255',
                'telefono1' => array('required','numeric','digits_between:9,14'),
                'telefono2' => array('required','numeric','digits_between:9,14'),
                'codigo_postal' => 'required|digits:5|integer'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                // No ha pasado la validacion

            } else {

                $cliente->correo = Input::get('correo');

                if (Input::get('password')) {
                    $cliente->password = Hash::make(Input::get('password'));
                }

                $cliente->nombre_contacto = Input::get('nombre_contacto');
                $cliente->direccion = Input::get('direccion');
                $cliente->telefono1 = Input::get('telefono1');
                $cliente->telefono2 = Input::get('telefono2');
                $cliente->codigo_postal = Input::get('codigo_postal');
                $cliente->nombre_empresa = Input::get('nombre_empresa');
                $cliente->completo = 1;
                $cliente->save();


            } // FIN ELSE VALIDACION

        } // FIN DE METODO POST


        return View::make('cliente.datos')->with('cliente', $cliente);
    }
    // FIN PARTE CLIENTE //////////////////////////////////////////////////////////////////////////// ->




    //  PARTE ADMINISTRACION //////////////////////////////////////////////////////////////////////////// ->
    public function listado()
    {

        $usuarios = Usuario::all();
        $tarifas = Tarifa::all();

        //dd($tarifas);
        //dd($usuarios);

        return View::make('admin.usuarios')->with(array('usuarios' => $usuarios, 'tarifas' => $tarifas));

    }


    public function modificar($id)
    {

        if (Request::isMethod('post')) {

            $rules = array(
                'correo' => 'required|email|between:1,255|unique:usuarios,correo,'.Auth::user()->id,
                'password' => 'alpha_num|between:1,255',
                'nombre_empresa' => 'required|between:1,255',
                'nombre_contacto' => 'required|between:1,255',
                'direccion' => 'required|between:1,255',
                'telefono1' => array('required','numeric','digits_between:9,14'),
                'telefono2' => array('required','numeric','digits_between:9,14'),
                'codigo_postal' => 'required|digits:5|integer',
                'rol' => 'required|alpha',
                'tarifa' => 'required|alpha'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                // No ha pasado la validacion

            } else {

                //dd(Input::all());
                $usu = Usuario::find($id);

                $usu->correo = Input::get('correo');

                if (Input::get('password')) {
                    $usu->password = Hash::make(Input::get('password'));
                }

                $usu->nombre_contacto = Input::get('nombre_contacto');
                $usu->direccion = Input::get('direccion');
                $usu->telefono1 = Input::get('telefono1');
                $usu->telefono2 = Input::get('telefono2');
                $usu->codigo_postal = Input::get('codigo_postal');
                $usu->nombre_empresa = Input::get('nombre_empresa');
                $usu->tarifa_id = Input::get('tarifa');
                $usu->save();

            }


        }


        // Generar lista de tarifas para cargalos con sintaxis laravel en un select
        // Se cargan id REAL, no autonumerico segun se añaden valores -> nombre de la tarifa
        $allTarifas = Tarifa::lists('nombre', 'id');

        $usuario = Usuario::find($id)->with('tarifa')->where('id', '=', $id)->get()->toArray();

        return View::make('admin.usuarios_editar')->with(array('usuario' => $usuario, 'alltarifas' => $allTarifas));

    }


    public function eliminar($id)
    {
        $usuario = Usuario::find($id);

        //dd($usuario);
        $usuario->delete();

        return Redirect::action('UsuariosController@listado');

    }
    // FIN PARTE ADMINSITRACION //////////////////////////////////////////////////////////////////////////// ->



    /* -----------------------------------------------------------
     *
     *         PARTE DE AUTENTICACION
     *
     ----------------------------------------------------------- */

    public function comprobar_new_correo()
    {
        if(Request::ajax()) {

            $j = Input::get('correo');

            $esta = 'true';

            $correo = Usuario::where('correo', '=', $j)->get();

            if($correo->count()) {
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


    public function estaLogueado()
    {
        if (Auth::check()) {
            // Si esta logueado
            return Redirect::to('/');
        }

        return View::make('publico.login');
    }



    public function validarUsuario()
    {
        $correo = Input::get('email');
        $contrasenia = Input::get('pwd');

        if (Auth::attempt(array('correo' => $correo, 'password' => $contrasenia))) {
            //dd($contrasenia);
            return Redirect::to('/');
        }

        return Redirect::to('/login');
    }



    public function logout()
    {
        Auth::logout();

        return Redirect::to('/');
    }



    public function registro()
    {
        return View::make('publico.registro');
    }



    public function crearUsuario()
    {
        $usuario = New Usuario();
        $usuario->correo = Input::get('correo');
        $usuario->password = Hash::make(Input::get('password'));
        $usuario->rol = 'cliente';             //Input::get('rol') //CAMBIAR ESTO POR "cliente"
        $usuario->tarifa_id = 0;
        $usuario->completo = 0;
        $usuario->save();

        return Redirect::to('/');
    }


}