<?php


class Categoria extends Eloquent
{

    protected $table = 'categorias';
    protected $fillable = array('*');



    // -----------------------| RELACIONES DEL MODELO CATEGORIA |----------------------- //

    /*
     * Relacion uno a muchos, hasMany.
     * Una categoria PUEDE PERTENECER a muchos productos.
     */
    public function productos()
    {
        return $this->hasMany('Producto', 'categoria_id', 'id');
    }






}