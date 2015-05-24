<?php


class PedidosController extends BaseController
{

    public function realizar_pedido_ajax()
    {



        ////////////////
        // PENSAR LA RELACION DE LOS ESTADOS PARA LOS PEDIDOS
        ////////////////



        $lista_compra = Input::get('objDatosColumna');
        //$lista1 = $lista_compra[1]['cantidad'];

        $fechaAhora_sql = date('Y-m-d G:i:s');

        $pedido = new Pedido();

        $pedido->usuario_id = Auth::user()->id;
        $pedido->tienda_id = 1; // MANDAR LA TIENDA QUE REALIAZA EL PEIDDO POR AJAX
        $pedido->estado = 1;
        $pedido->fechaPedido = $fechaAhora_sql; // Solo se guarda fecha, campo en bd de solo fecha sin horas



        if ($pedido->save())
        {
            $t = array();

            foreach ($lista_compra as $lis) {

                $mas = array(
                    'pedido_id' => $pedido->id,
                    'producto_id' => $lis['idarticulo'],
                    'precioUnidad' => $lis['precio'],
                    'cantidad' => $lis['cantidad'],
                    'iva' => $lis['iva']);

                array_push($t, $mas);


            } // END FOR EACH

            if (DB::table('detalles_pedidos')->insert($t)) {
                return Response::json(array('status' => 'success'));

            } else {

                return Response::json(array('status' => 'error'));
            }




        } // FIN DEL IF GUARDAR



/*
        if (Request::ajax())
        {
            $variable = Input::all();
            return Response::json($variable);

            //echo (Input::all());
        }
*/

    }




    public function producto_ajax($id)
    {


        if (Request::ajax()) {

            $producto = Producto::find($id)->toArray();
            //dd($producto);

            $variable[] = array(
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio_total' => $producto['precio_total'],
                'iva' => $producto['iva']
            );

            //return Response::json($datos);
            return Response::json($variable);

        }
    }

    public function pedir_productos_ajax($id)
    {

        //$datos = Categoria::where('id', '=', $id)->with('productos')->get()->toArray();
        //dd($datos[0]['productos']);

        if (Request::ajax()) {

            $datos = Categoria::where('id', '=', $id)->with('productos')->get()->toArray();
            //dd($datos[0]['productos']);

            foreach ($datos[0]['productos'] as $producto) {
                if($producto['activo'] == "1"){
                    $variable[] = array(
                        'id' => $producto['id'],
                        'nombre' => $producto['nombre']
                    );
                }
            }

            return Response::json($variable);

        }
    }

    public function inicio()
    {

        // AQUI NECESITO:
        // USUARIO QUE HACE EL PEDIDO
        // TIENDA QUE REALIZA EL PEDIDO
        // FECHA QUE SE REALIZA EL PEDIDO
        // FECHA PARA LA ENTREGA DEL PEDIDO
        // ESTADO DEL PEDIDO
        // QUIZAS LAS TARIFAS



        $datos_usuario = Usuario::with('tiendas', 'tarifa', 'pedidos')->where('id', '=', Auth::user()->id)->get()->toArray();
        //dd($datos_usuario);


        $pedidos_usuario = Pedido::where('usuario_id', '=', Auth::user()->id)->with('productos')->get()->toArray();
        //dd($pedidos_usuario[0]['productos']);


        // Categorias activas con los productos
        //$categorias_y_productos = Categoria::with('productos')->where('activo', '=', 1)->get()->toArray();
        //dd($categorias_y_productos[0]);
        $categorias_activas = Categoria::where('activo', '=', 1)->get()->toArray();
        //dd($categorias_activas);


        return View::make('cliente.pedidos')->with(array('pedidos_usuario' => $pedidos_usuario, 'categoriasActivas' => $categorias_activas, 'datosUsuario' => $datos_usuario));
    }

    public function borrar($id)
    {

    }

    public function modiicar_pedido($id)
    {


    }

    public function nuevo_pedido()
    {

    }





}
