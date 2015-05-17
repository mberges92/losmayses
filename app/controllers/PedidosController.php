<?php


class PedidosController extends BaseController
{

    public function inicio()
    {

        // AQUI NECESITO:
        // USUARIO QUE HACE EL PEDIDO
        // TIENDA QUE REALIZA EL PEDIDO
        // FECHA QUE SE REALIZA EL PEDIDO
        // FECHA PARA LA ENTREGA DEL PEDIDO
        // ESTADO DEL PEDIDO
        // QUIZAS LAS TARIFAS

        $datos_usuario = Usuario::with('tiendas', 'tarifa', 'pedidos')->get()->toArray();
        dd($datos_usuario);


        $pedidos_usuario = Pedido::where('usuario_id', '=', Auth::user()->id)->with('productos')->get()->toArray();
        //dd($pedidos_usuario);

        // Productos activos
        //$productos = Producto::where('activo', '=', 1)->get()->toArray();
        //dd($productos);

        //Categorias activas
        $categorias_y_productos = Categoria::with('productos')->where('activo', '=', 1)->get()->toArray();
        //dd($categorias_y_productos);

        return View::make('cliente.pedidos')->with(array('pedidos_usuario' => $pedidos_usuario, 'categoriasProductos' => $categorias_y_productos));
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
