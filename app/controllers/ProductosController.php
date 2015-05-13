<?php


class ProductosController extends BaseController
{

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
        $producto->cantidad_minima = Input::get('cantidad_minima');
        $producto->iva = Input::get('iva');
        $producto->precio_total = Input::get('precio_total');

        $producto->save();

        return Redirect::action('ProductosController@listado');



    }

    public function editar()
    {


    }

    public function eliminar()
    {


    }






}