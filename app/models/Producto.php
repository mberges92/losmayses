<?php


class Producto extends Eloquent
{

    protected $table = 'productos';
    protected $fillable = array('*');


    // -----------------------| RELACIONES DEL MODELO PRODUCTO |----------------------- //

    /*
     * Relacion inversa para el hasMany del modelo categorias.
     * Un producto tiene UNA SOLA CATEGORIA asignada.
     */
    public function categoria()
    {
        return $this->belongsTo('Categoria', 'categoria_id', 'id');
    }


    /*
     * Relacion de MUCHOS A MUCHOS entre productos y pedidos.
     * Un producto PUEDE PERTENECER A MUCHOS pedidos.
     */
    public function pedidos()
    {
        return $this->belongsToMany('Pedido', 'detalles_pedidos', 'pedido_id', 'producto_id');
    }





}