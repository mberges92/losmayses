<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = array('*');



    // -----------------------| RELACIONES DEL MODELO USUARIO |----------------------- //

    /*
     * Relacion inversa para el hasMany del modelo tarifas.
     * Un usuario o cliente tiene UNA SOLA TARIFA asignada.
     */
    public function tarifa()
    {
        return $this->belongsTo('Tarifa', 'tarifa_id', 'id');
    }


    /*
     * Relacion uno a muchos, hasMany.
     * Un usuario PUEDE TENER MUCHAS tiendas.
     */
    public function tiendas()
    {
        return $this->hasMany('Tienda', 'usuario_id', 'id');
    }


}
