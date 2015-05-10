<?php


class Tienda extends Eloquent {

    protected $table = 'tiendas';
    protected $fillable = array('*');



 /*
 * RELACIONES DEL MODELO TIENDA
 *
 */


    // Relacion inversa *una tienda - una tarifa*
    public function tarifas()
    {
        return $this->belongsTo('Tarifa', 'id');
    }

    // Relacion inversa *un usuario - una tienda*
    public function usuarios()
    {
        return $this->belongsTo('Usuario', 'id');
    }


}