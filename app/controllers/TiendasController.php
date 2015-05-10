<?php


class TiendasController extends BaseController {

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

        return Redirect::to('/admin');


    }

}