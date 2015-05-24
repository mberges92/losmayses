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
    /* RELACION VIEJA, INSERVIBLE
    public function categoria()
    {
        return $this->belongsTo('Categoria', 'categoria_id', 'id');
    }
    */


    /*
     * Relacion de MUCHOS A MUCHOS entre productos y pedidos.
     * Un producto PUEDE PERTENECER A MUCHOS pedidos.
     */
    public function pedidos()
    {
        return $this->belongsToMany('Pedido', 'detalles_pedidos', 'pedido_id', 'producto_id')->withPivot('precioUnidad', 'cantidad', 'iva');
    }

    /*
     * Relacion de MUCHOS A MUCHOS entre categorias y productos.
     * Un producto PUEDE TENER MUCHAS categorias.
     */
    public function categorias()
    {
        return $this->belongsToMany('Categoria', 'categorias_productos', 'producto_id',  'categoria_id');
    }




}