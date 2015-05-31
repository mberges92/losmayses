<?php


class ProductosController extends BaseController
{

    public function activar_ajax($producto_id=null, $valor=null)
    {

        if(Request::ajax()) {
            if(!$producto_id ){
                return 0;
            }


            $pro_id = Producto::find($producto_id);

            if ($valor == "1") {
                $pro_id->activo = 0;
                $pro_id->save();
                $valor = "0";
            } elseif ($valor == "0") {
                $pro_id->activo = 1;
                $pro_id->save();
                $valor = "1";
            }


            $data = array('estado' => $valor,
                'id' => $producto_id,
                'field' => 'activo');

            return Response::json($data);

        }

    }



    public function comprobar_new_producto() {

        if(Request::ajax()) {

            $j = Input::get('nombre');

            $esta = 'true';

            $producto = Producto::where('nombre', '=', $j)->get();

            if($producto->count()) {
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



    public function comprobar_producto_existente($id_producto) {

        if(Request::ajax()) {

            $m = Input::get('nombre');


            $esta = 'true';

            //$producto = Producto::where('nombre', '=', $m)->get();
            $producto = Producto::where('nombre', '=', $m)->whereNotIn( 'id', [$id_producto])->get();



            if($producto->count()) {
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

        $productos = Producto::all();

        return View::make('admin.productos')->with('productos', $productos);

    }

    public function nuevo()
    {
        //dd(Input::all());

        $producto = new Producto();

        $producto->nombre = Input::get('nombre');
        $producto->activo = 0;

        $producto->save();

        //return View::make('');
        return Redirect::action('ProductosController@modificar', array('id' => $producto->id));

    }



    public function modificar($id)
    {

        if (Request::isMethod('post')) {

            $categorias_seleccionadas = Input::get('kcategoria');
            //dd($categorias_seleccionadas);

            $pro = Producto::find($id);
            $pro->nombre = Input::get('nombre');
            $pro->iva = Input::get('iva');
            $pro->precio_total = Input::get('precio_total');
            $pro->save();

            // SI NO LLEVA NADA NO ES UN ARRAY Y PETA
            Producto::find($pro->id)->categorias()->detach();
            if (is_array($categorias_seleccionadas)) {
                $pro->categorias()->sync($categorias_seleccionadas);
            }

            //dd(Input::all());

            return Redirect::action('ProductosController@listado');


        }

        $producto = Producto::with('categorias')->find($id)->toArray();
        $allCategorias = Categoria::all()->toArray();

        return View::make('admin.productos_editar')->with(array('producto'=> $producto, 'allcategorias' => $allCategorias));

    }

    public function eliminar($id)
    {


        Producto::find($id)->categorias()->detach(); // Esto borra las relaciones intermedias con categorias
        Producto::find($id)->delete(); // Esto borra el producto

        return Redirect::action('ProductosController@listado');

    }






}