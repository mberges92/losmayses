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

Route::get('/admin/usuarios', 'UsuariosController@listado');

Route::get('/admin/tiendas', 'TiendasController@listado');
Route::post('/admin/tiendas/nueva', 'TiendasController@nueva');
Route::get('/admin/tiendas/eliminar/{id}', 'TiendasController@eliminar');

Route::get('/admin/tarifas', 'TarifasController@listado');
Route::post('/admin/tarifas/nueva', 'TarifasController@nueva');
Route::get('/admin/tarifas/eliminar/{id}', 'TarifasController@eliminar');

Route::get('/admin/categorias', 'CategoriasController@listado');
Route::post('/admin/categorias/nueva', 'CategoriasController@nueva');
Route::get('/admin/categorias/eliminar/{id}', 'CategoriasController@eliminar');

Route::get('/admin/productos', 'ProductosController@listado');
Route::post('/admin/productos/nueva', 'ProductosController@nueva');
Route::get('/admin/productos/eliminar/{id}', 'ProductosController@eliminar');






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


/*
|--------------------------------------------------------------------------
| Con esto puedo definir variables en las vista sin que sean
| imprimidas en el html
| <code>
| @define $variable = "whatever"
| </code>
|--------------------------------------------------------------------------
*/

Blade::extend(function($value) {
    return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
});





