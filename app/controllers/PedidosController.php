<?php


class PedidosController extends BaseController
{

    public function pedir_productos_ajax()
    {
        echo "HOLA";

        if (Request::ajax())
        {
            /*
                Respuesta JSON
                return Response::json(array('name' => 'Steve', 'state' => 'CA'));

                Crear una respuesta tipo JSONP
                return Response::json(array('name' => 'Steve', 'state' => 'CA'))->setCallback(Input::get('callback'));
            */
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


        return View::make('cliente.pedidos')->with(array('pedidos_usuario' => $pedidos_usuario, 'categoriasActivas' => $categorias_activas));
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
