<?php


class Tarifa extends Eloquent {

    protected $table = 'tarifas';
    protected $fillable = array('*');

    /*
    * RELACIONES DEL MODELO TARIFA
    *
    */

    // UNO A MUCHOS
    // Una tarifa tiene muchas tiendas
    public function tiendas()
    {
        return $this->hasMany('Tienda', 'tarifa_id');
    }

}