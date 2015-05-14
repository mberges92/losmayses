<?php


class UsuariosController extends BaseController {


    public function datos_cliente($id)
    {

        $cliente = Usuario::find($id);

        if (Request::isMethod('post')) {

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
            $cliente->save();

        }


        return View::make('cliente.datos')->with('cliente', $cliente);
    }













    public function listado()
    {

        $usuarios = Usuario::all();

        return View::make('admin.usuarios')->with('usuarios', $usuarios);

    }


    /* -----------------------------------------------------------
     *
     *         PARTE DE AUTENTICACION
     *
     ----------------------------------------------------------- */

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
        $usuario->rol = Input::get('rol'); //CAMBIAR ESTO POR "cliente"
        $usuario->tarifa_id = 1;
        $usuario->save();

        return Redirect::to('/');
    }


}