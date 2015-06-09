<?php


class PedidosController extends BaseController
{


    public function gen_num_albaran()
    {

        if (Request::ajax()) {

            $numero_max = DB::table('pedidos')->max('num_albaran');
            $numero_max += 1;

            $datos = Input::get('objDatos');

            $idpedido = $datos[0]['idPedido'];

            $pedido = Pedido::find($idpedido);

            $pedido->num_albaran = $numero_max;

            if ($pedido->save()) {
                return Response::json(array('status' => 'success'));

            } else {

                return Response::json(array('status' => 'error'));
            }


        }

    }

    public function gen_num_factura()
    {

        if (Request::ajax()) {

            $numero_max = DB::table('pedidos')->max('num_factura');
            $numero_max += 1;

            $datos = Input::get('objDatos');

            $idpedido = $datos[0]['idPedido'];

            $pedido = Pedido::find($idpedido);

            $pedido->num_factura = $numero_max;

            if ($pedido->save()) {
                return Response::json(array('status' => 'success'));

            } else {

                return Response::json(array('status' => 'error'));
            }


        }

    }



    public function generar_albaran($pedido_id)
    {
        $datos_pedido = Pedido::with('usuario')->where('id', '=', $pedido_id)->get()->toArray();
        //dd($datos_pedido);

        $datos_tienda = Tienda::where('usuario_id', '=', $datos_pedido[0]['usuario']['id'])->get()->toArray();
        //dd($datos_tienda);

        $productos_pedido = DB::table('detalles_pedidos')->where('pedido_id', '=', $pedido_id)->get();
        //dd($productos_pedido);

        $productos = Producto::all()->toArray();
        //dd($productos);


        return View::make('albaran')->with(array('datosPedido' => $datos_pedido, 'productosPedido' => $productos_pedido, 'productos' => $productos, 'datosTienda' => $datos_tienda));
    }


    public function generar_factura($pedido_id) {

        $datos_pedido = Pedido::with('usuario')->where('id', '=', $pedido_id)->get()->toArray();
        //dd($datos_pedido);

        $datos_tienda = Tienda::where('usuario_id', '=', $datos_pedido[0]['usuario']['id'])->get()->toArray();
        //dd($datos_tienda);

        $productos_pedido = DB::table('detalles_pedidos')->where('pedido_id', '=', $pedido_id)->get();
        //dd($productos_pedido);

        $productos = Producto::all()->toArray();
        //dd($productos);


        return View::make('factura')->with(array('datosPedido' => $datos_pedido, 'productosPedido' => $productos_pedido, 'productos' => $productos, 'datosTienda' => $datos_tienda));
    }

    public function cambio_estado_pedido()
    {

        if (Request::ajax()) {


            $datos = Input::get('objDatosPedido');
            //echo $datos[0]['estadoPedido'];

            $idp = $datos[0]['idPedido'];
            $esp = $datos[0]['estadoPedido'];

            $pedido = Pedido::find($idp);

            $pedido->estado = $esp;
            $pedido->save();

            return Response::json(array('status' => 'success'));

        }

    }



    public function listados_pedidos_admin()
    {

        $pedidos = Pedido::with('productos', 'usuario')->get()->toArray();
        //dd($pedidos);

        return View::make('admin.pedidos')->with('pedidos', $pedidos);

    }




    public function realizar_pedido_ajax()
    {


        $lista_compra = Input::get('objDatosColumna');
        //$lista1 = $lista_compra[1]['cantidad'];

        $datos_pedido = Input::get('objDatosCliente');


        $fechaAhora_sql = date('Y-m-d G:i:s');
        $fechaEntrega = date("Y-m-d", strtotime($datos_pedido[0]['fechaEntrega']));

        $pedido = new Pedido();

        $pedido->usuario_id = Auth::user()->id;
        $pedido->tienda_id = $datos_pedido[0]['idtienda']; // MANDAR LA TIENDA QUE REALIAZA EL PEIDDO POR AJAX
        $pedido->estado = 1;
        $pedido->fechaPedido = $fechaAhora_sql; // Solo se guarda fecha, campo en bd de solo fecha sin horas
        $pedido->fechaEntrega = $fechaEntrega;
        $pedido->signo_tarifa = $datos_pedido[0]['signoTarifa'];
        $pedido->valor_tarifa = $datos_pedido[0]['valorTarifa'];



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


    public function borrar($pedido_id)
    {
        //if (DB::table('detalles_pedidos')->insert($t)) {

        $detalles_pedido = DB::table('detalles_pedidos')->where('pedido_id', '=', $pedido_id)->delete();

        $pedido = Pedido::find($pedido_id);
        $pedido->delete();

        return Redirect::to('/admin/pedidos');

    }


    public function ver_pedido_admin($pedido_id)
    {
        $datos_pedido = Pedido::with('usuario')->where('id', '=', $pedido_id)->get()->toArray();
        //dd($datos_pedido);

        $datos_tienda = Tienda::where('usuario_id', '=', $datos_pedido[0]['usuario']['id'])->get()->toArray();
        //dd($datos_tienda);

        $productos_pedido = DB::table('detalles_pedidos')->where('pedido_id', '=', $pedido_id)->get();
        //dd($productos_pedido);

        $productos = Producto::all()->toArray();
        //dd($productos);

        $tarifas = Tarifa::all()->toArray();
        //dd($tarifas);


        // LLevo los datos datos de la tarifa, solo signo y valor
        foreach ($tarifas as $tar) {
            if ($tar['id'] == $datos_pedido[0]['usuario']['tarifa_id']) {
                $f = array('signo' => $tar['signo'],
                    'valor' => $tar['valor']);
            }
        }
        //dd($f);



        return View::make('admin.pedidos_ver')->with(array('datosPedido' => $datos_pedido, 'productosPedido' => $productos_pedido, 'productos' => $productos, 'datosTienda' => $datos_tienda));

    }



}
