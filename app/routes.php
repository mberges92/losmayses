<?php




// Parte pública
Route::get('/', function()
{
    return View::make('publico.index');
});
Route::get('/trabajos', function() {
    return View::make('publico.trabajos');
});
Route::get('/contacto', function() {
    return View::make('publico.contacto');
});




// Parte administración
Route::get('/admin', function() {
    return View::make('admin.index');
});
Route::get('', '');
Route::get('', '');
Route::get('', '');
Route::get('', '');
Route::get('', '');
Route::get('', '');
Route::get('', '');



// Parte cliente
//
//
//



// Autenticación
Route::get('/login', 'UsuariosController@estaLogueado');
Route::post('/login', 'UsuariosController@validarUsuario');

// Registro
Route::get('/registro', 'UsuariosController@registro');
Route::post('/registro', 'UsuariosController@crearUsuario');


// Para entrar a las url contenidas en este grupo, sera obligatorio estar autenticado en el sistema
Route::group(array('before' => 'auth'), function() {

    Route::get('/logout', 'UsuariosController@logout');

});



/*
 * Añade la funcionalidad de poder usar @break y @continue en una vista .blade como en php normal,
 * ya que blade no lo incluye por defecto. Interesante para los bucles.
 */

Blade::extend(function($value)
{
    return preg_replace('/(\s*)@(break|continue)(\s*)/', '$1<?php $2; ?>$3', $value);
});






