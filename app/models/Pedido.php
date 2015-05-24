<?php


class Pedido extends Eloquent
{

    protected $table = 'pedidos';
    protected $fillable = array('*');
    public $timestamps = false;

    // -----------------------| RELACIONES DEL MODELO PEDIDO |----------------------- //

    /*
     * Relacion de MUCHOS A MUCHOS entre pedidos y productos.
     * Un pedido PUEDE TENER MUCHOS productos.
     */
    public function productos()
    {
        return $this->belongsToMany('Producto', 'detalles_pedidos', 'producto_id', 'pedido_id')->withPivot('precioUnidad', 'cantidad', 'iva');
    }


     /*
     * Relacion inversa para el hasMany del modelo pedidos.
     * Un pedido tiene UN SOLO CLIENTE asignado.
     */
    public function usuario()
    {
        return $this->belongsTo('Usuario', 'usuario_id', 'id');
    }


}