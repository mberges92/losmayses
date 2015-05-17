<?php


class Categoria extends Eloquent
{

    protected $table = 'categorias';
    protected $fillable = array('*');
    public $timestamps = false;



    // -----------------------| RELACIONES DEL MODELO CATEGORIA |----------------------- //

    /*
     * Relacion uno a muchos, hasMany.
     * Una categoria PUEDE PERTENECER a muchos productos.
     */

    /* ANTIGUA RELACION, INSERVIBLE
    public function productos()
    {
        return $this->hasMany('Producto', 'categoria_id', 'id');
    }
    */

    /*
     * Relacion de MUCHOS A MUCHOS entre categorias y productos.
     * Una categoria PUEDE PERTENECER A MUCHOS productos.
     */
    public function productos()
    {
        return $this->belongsToMany('Producto', 'categorias_productos', 'categoria_id', 'producto_id');
    }






}