<?php


class Tienda extends Eloquent {

    protected $table = 'tiendas';
    protected $fillable = array('*');



    // -----------------------| RELACIONES DEL MODELO TIENDA |----------------------- //

    /*
     * Relacion inversa para el hasMany del modelo usuario.
     * Una tienda PERTENECE A UN SOLO USUARIO.
     */
    public function usuario()
    {
        return $this->belongsTo('Usuario', 'usuario_id', 'id');
    }

}