<?php




// Parte pública --------------------------------------------------------------------------------------------
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




// Parte administración --------------------------------------------------------------------------------------
Route::get('/admin', function() {
    return View::make('admin.index');
});

Route::get('/admin/pedidos', 'PedidosController@listados_pedidos_admin');
Route::get('/admin/pedidos/ver/{id}', 'PedidosController@ver_pedido_admin');
Route::get('/admin/pedidos/eliminar/{id}', 'PedidosController@borrar');



Route::get('/admin/pedidos/albaran', 'PedidosController@generar_albaran');
Route::get('/admin/pedidos/factura/{id}', 'PedidosController@generar_factura');



Route::get('/admin/clientes', 'UsuariosController@listado');
Route::get('/admin/clientes/editar/{id}', 'UsuariosController@modificar');
Route::post('/admin/clientes/editar/{id}', 'UsuariosController@modificar');
Route::get('/admin/clientes/eliminar/{id}', 'UsuariosController@eliminar');


Route::get('/admin/tiendas', 'TiendasController@listado');
Route::post('/admin/tiendas/nueva', 'TiendasController@nueva');
Route::get('/admin/tiendas/eliminar/{id}', 'TiendasController@eliminar');

Route::get('/admin/tarifas', 'TarifasController@listado');
Route::post('/admin/tarifas/nueva', 'TarifasController@nueva');
Route::get('/admin/tarifas/editar/{id}', 'TarifasController@modificar');
Route::post('/admin/tarifas/editar/{id}', 'TarifasController@modificar');
Route::get('/admin/tarifas/eliminar/{id}', 'TarifasController@eliminar');

Route::get('/admin/categorias', 'CategoriasController@listado');
Route::post('/admin/categorias/nueva', 'CategoriasController@nueva');
Route::get('/admin/categorias/editar/{id}', 'CategoriasController@modificar');
Route::post('/admin/categorias/editar/{id}', 'CategoriasController@modificar');
Route::get('/admin/categorias/eliminar/{id}', 'CategoriasController@eliminar');

Route::get('/admin/productos', 'ProductosController@listado');
Route::post('/admin/productos/nuevo', 'ProductosController@nuevo');
Route::get('/admin/productos/editar/{id}', 'ProductosController@modificar');
Route::post('/admin/productos/editar/{id}', 'ProductosController@modificar');
Route::get('/admin/productos/eliminar/{id}', 'ProductosController@eliminar');






// Parte cliente -----------------------------------------------------------------------------------------------
Route::get('/cliente/{id}', function() {
    return View::make('cliente.index');
});
Route::get('/cliente/{id}/datos', 'UsuariosController@datos_cliente');
Route::post('/cliente/{id}/datos', 'UsuariosController@datos_cliente');
Route::get('/cliente/{id}/tiendas', 'TiendasController@tiendas_usuario');
Route::post('/cliente/{id}/tiendas/nueva', 'TiendasController@nueva_tienda');
Route::get('/cliente/{id}/tiendas/{tienda}', 'TiendasController@modificar_tienda');
Route::post('/cliente/{id}/tiendas/{tienda}', 'TiendasController@modificar_tienda');
Route::get('/cliente/{id}/tiendas/eliminar/{tienda}', 'TiendasController@eliminar_tienda');
Route::get('/cliente/{id}/pedidos', 'PedidosController@inicio');


Route::get('/cliente/getProductos', 'PedidosController@pedir_productos_ajax'); // LLAMADA AJAX
Route::any('/cliente/nuevoPedido', 'PedidosController@realizar_pedido_ajax'); // LLAMADA AJAX

Route::get('admin/productos/boolean_ajax/{id}/{valor}/activo', 'ProductosController@activar_ajax'); // AJAX ACTIVAR/DESACTIVAR PRODUCTO
Route::get('admin/categorias/boolean_ajax/{id}/{valor}/activo', 'CategoriasController@activar_ajax'); // AJAX ACTIVAR/DESACTIVAR CATEGORIA
Route::get('admin/usuarios/boolean_ajax/{id}/{valor}/activo', 'UsuariosController@activar_ajax'); // AJAX ACTIVAR/DESACTIVAR USUARIO


Route::post('admin/pedidos/cambio_estado', 'PedidosController@cambio_estado_pedido'); //LLAMADA AJAX CAMBIO ESTADO PEDIDO


Route::get('pedir_productos/{id}', 'PedidosController@pedir_productos_ajax'); // LLAMADA AJAX
Route::get('buscar_producto/{id}', 'PedidosController@producto_ajax'); // LLAMADA AJAX


Route::get('validation/comprobar_correo/{id_usuario}', 'UsuariosController@comprobar_email_existente'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_producto/{id_producto}', 'ProductosController@comprobar_producto_existente'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_newProducto', 'ProductosController@comprobar_new_producto'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_categoria/{id_categoria}', 'CategoriasController@comprobar_categoria_existente'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_newCategoria', 'CategoriasController@comprobar_new_categoria'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_tarifa/{id_tarifa}', 'TarifasController@comprobar_tarifa_existente'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_newTarifa', 'TarifasController@comprobar_new_tarifa'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_tienda/{id_tienda}', 'TiendasController@comprobar_tienda_existente'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_nuevaTienda/{id_usuario}', 'TiendasController@comprobar_tienda_nuevaTienda'); // LLAMADA AJAX PARA JQUERY VALIDATION
Route::get('validation/comprobar_newCorreo', 'UsuariosController@comprobar_new_correo'); // LLAMADA AJAX PARA JQUERY VALIDATION



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





