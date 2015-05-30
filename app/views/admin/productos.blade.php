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
                    <td>{{ $producto->activo }}</td>
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

            $('#nuevoProductoForm').validate({
                rules: {
                    nombre: {
                        required: true,
                        maxlength: 255,
                        remote: "http://"+location.host+"/losmayses/public/validation/comprobar_newProducto"
                    }
                } // FIN DE RULES

            });

        </script>



@stop