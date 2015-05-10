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


    /*
     * RELACIONES DEL MODELO USUARIO
     *
     */
    /*
    public function tiendas()
    {
        return $this->belongsToMany('Tienda', 'tiendas_usuarios', 'usuario_id', 'tienda_id');
    }
    */

    // UNO A MUCHOS
    // Un usuario tiene muchas tiendas
    public function tiendas()
    {
        return $this->hasMany('Tienda', 'usuario_id');
    }



}
