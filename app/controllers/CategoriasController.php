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

            $rules = array(
                'nombre' => 'required|alpha_dash|between:1,255|unique:categorias,nombre'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                // No ha pasado la validacion

            } else {

            $categoria = new Categoria();

            $categoria->nombre = Input::get('nombre');
            $categoria->activo = 1;

            $categoria->save();

            return Redirect::to('/admin/categorias');
            }
        }
    }


    public function eliminar($id)
    {
        //$categoria = Categoria::find($id);
        //$categoria->delete();

        //return Redirect::to('/admin');


        Categoria::find($id)->productos()->detach(); // Esto borra las relaciones intermedias con productos
        Categoria::find($id)->delete(); // Esto borra la categoria

        return Redirect::action('CategoriasController@listado');
    }


    public function modificar($id)
    {

        if (Request::isMethod('post')) {


            $rules = array(
                'nombre' => 'required|alpha_dash|between:1,255|unique:categorias,nombre'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                // No ha pasado la validacion

            } else {


                $cat = Categoria::find($id);

                $cat->nombre = Input::get('nombre');

                $cat->save();

            }
        }

        $categoria = Categoria::find($id)->toArray();

        return View::make('admin.categorias_editar')->with('categoria', $categoria);
    }

}