<?php


class UsuariosController extends BaseController {


    public function datos_cliente($id)
    {
        $cliente = Usuario::find($id);

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
        $usuario->username = Input::get('username');
        $usuario->password = Hash::make(Input::get('password'));
        $usuario->correo = Input::get('correo');
        $usuario->rol = Input::get('rol');
        $usuario->save();

        return Redirect::to('/');
    }


}