@extends('layout_admin')
@section('titulo') Administracion - Productos @stop


@section('content')

    <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#nuevo_producto">Nuevo Producto</button></a>

    <hr/>

    <div class="container">
        <table class="table">
            <legend>LISTADO</legend>
            <thead>
            <th>Activo</th>
            <th>Nombre</th>
            <th>IVA</th>
            <th>Precio Unidad o Pack</th>
            <th>Accion</th>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>
                        @if ($producto->activo == 1)
                            <a class="ajax_bool btn btn-sm btn-success-alt" href="/losmayses/public/admin/productos/boolean_ajax/{{ $producto->id }}/1/activo">
                                <span class="estado_activo">Activo</span></a>
                        @else
                            <a class="ajax_bool btn btn-sm btn-danger-alt" href="/losmayses/public/admin/productos/boolean_ajax/{{ $producto->id }}/0/activo">
                                <span class="estado_inactivo">Inactivo</span></a>
                        @endif
                    </td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->iva }}</td>
                    <td>{{ $producto->precio_total }} €</td>
                    <td>{{ HTML::link('/admin/productos/editar/'.$producto['id'], 'MODIFICAR') }}</td>
                    <td>
                        <button  data-toggle="modal" data-target="#modal_{{ $producto['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>



    <!-- VENTANA MODAL CREAR PRODUCTO -->
    <div id="nuevo_producto" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Nuevo producto</h4>
                </div>
                <div class="modal-body">
                    <div id="add_producto" class="add_from_admin dialog_form" title="Nueva tienda">

                        {{ Form::open(array(
                            'url' => '/admin/productos/nuevo',
                            'method' => 'post',
                            'action' => 'ProductosController@nuevo',
                            'id' => 'nuevoProductoForm'
                            )) }}

                        <div class="form-group required">
                            {{Form::label('nombre', 'Nombre', array('id' => 'modalEtiqueta'))}}
                            {{Form::text('nombre', '', array('id' => 'modalInput', 'required' => 'required'))}}
                        </div>
                        <br/>
                        <div class="submit">
                            {{Form::submit('Crear', array('class' => 'btn btn-primary'))}}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN VENTANA MODAL CREAR PRODUCTO -->




    <!-- CONFIRMACIONES BORRAR PRODUCTOS -->
    @foreach($productos as $producto)
        <div id="modal_{{ $producto->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                        <h4 class="modal-title">Borrar '{{ $producto['nombre'] }}'</h4>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de querer borrar el producto '{{ $producto['nombre'] }}'?<br/>
                        {{ HTML::link('/admin/productos/eliminar/'.$producto['id'], 'SI') }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- FIN CONFIRMACIONES BORRAR PRODUCTOS -->

        <script>

            $(document).ready(function(){
                $('#nuevoProductoForm').validate({
                    rules: {
                        nombre: {
                            required: true,
                            maxlength: 255,
                            remote: "http://"+location.host+"/losmayses/public/validation/comprobar_newProducto"
                        }
                    } // FIN DE RULES

                });


                $('A.ajax_bool').click(function(e){
                    e.preventDefault();

                    var $this = $(this);
                    var url = $(this).attr('href');
                    var url_arr = url.split("/");
                    url_arr.splice( url_arr.indexOf('boolean_ajax')+1 , 3);

                    $this.html('<span class="estado_loading">esperando...</span>');

                    $.get(url, function(data){

                        //console.log(data);
                        if(!data.error){
                            //data.estado = 1, data.field = activo, data.id = 1;
                            if(data.estado == 1){
                                var span = '<span class="estado_activo">Activo</span>';
                            }else{
                                var span = '<span class="estado_inactivo">Inactivo</span>';
                            }
                            var href = url_arr.join('/')+"/"+data.id+"/"+data.estado+"/"+data.field;

                            if(data.estado == 1){
                                $this.removeClass("btn-danger-alt").addClass("btn-success-alt");
                            }else{
                                $this.removeClass("btn-success-alt").addClass("btn-danger-alt");
                            }

                            $this
                                    .attr('href', href)
                                    .html(span);


                        }
                    }, "json")
                            .fail(function(result) {
                                //console.log(result);
                            });

                }); // FIN DE ACTIVAR/DESACTIVAR POR AJAX


            });


    </script>

@stop