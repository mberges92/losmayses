<?php


class Pedido extends Eloquent
{

    protected $table = 'pedidos';
    protected $fillable = array('*');



    // -----------------------| RELACIONES DEL MODELO PEDIDO |----------------------- //

    /*
     * Relacion de MUCHOS A MUCHOS entre pedidos y productos.
     * Un pedido PUEDE TENER MUCHOS productos.
     */
    public function productos()
    {
        return $this->belongsToMany('Producto', 'detalles_pedidos', 'producto_id', 'pedido_id');
    }




}