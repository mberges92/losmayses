<?php


class TarifasController extends BaseController {




    public function comprobar_tarifa_existente($id_tarifa) {

        if(Request::ajax()) {

            $m = Input::get('nombre');


            $esta = 'true';

            $tarifa = Tarifa::where('nombre', '=', $m)->whereNotIn( 'id', [$id_tarifa])->get();



            if($tarifa->count()) {
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

        return Redirect::to('/admin/tarifas');
    }

    public function modificar($id)
    {

        $tarifa = Tarifa::find($id);

        return View::make('admin.tarifas_editar')->with('tarifa', $tarifa);


    }

}