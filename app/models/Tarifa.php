<?php


class Tarifa extends Eloquent {

    protected $table = 'tarifas';
    protected $fillable = array('*');

    // -----------------------| RELACIONES DEL MODELO TARIFA |----------------------- //

    /*
     * Relacion uno a muchos, hasMany.
     * Una tarifa PUEDE PERTENECER a muchos usuarios
     */
    public function usuarios()
    {
        return $this->hasMany('Usuario', 'tarifa_id', 'id');
    }

}