<?php


class CategoriasController extends BaseController
{

    public function listado()
    {
        $categorias = Categoria::all();

        return View::make('admin.categorias')->with('categorias', $categorias);

    }


    public function nueva()
    {

        if (Request::isMethod('post')) {

            //dd(Input::all());

            $categoria = new Categoria();

            $categoria->nombre = Input::get('nombre');

            $categoria->save();

            return Redirect::to('/admin/categorias');
        }
    }


    public function eliminar($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return Redirect::to('/admin');
    }



}
