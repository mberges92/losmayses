<?php


class TarifasController extends BaseController {

    public function listado()
    {
        $tarifas = Tarifa::all();

        return View::make('admin.tarifas')->with('tarifas', $tarifas);

    }


    public function nueva()
    {

        if (Request::isMethod('post')) {

            //dd(Input::all());

            $tarifa = new Tarifa();

            $tarifa->nombre = Input::get('nombre');
            $tarifa->signo = Input::get('signo');
            $tarifa->valor = Input::get('valor');

            $tarifa->save();

            return Redirect::to('/admin/tarifas');
        }
    }


    public function eliminar($id)
    {
        $tarifa = Tarifa::find($id);
        $tarifa->delete();

        return Redirect::to('/admin');
    }

}