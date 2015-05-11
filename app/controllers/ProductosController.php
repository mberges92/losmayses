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


    }

    public function editar()
    {


    }

    public function eliminar()
    {


    }






}