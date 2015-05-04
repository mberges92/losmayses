<?php


class UsuariosController extends BaseController {


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
        $usuario = Input::get('usr');
        $contrasenia = Input::get('pwd');


        if (Auth::attempt(array('username' => $usuario, 'password' => $contrasenia))) {
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