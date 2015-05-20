@extends('layout_admin')
@section('titulo') Administracion - Categorias @stop


@section('content')

    <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#nueva_categoria">Nueva Categoria</button></a>

    <hr/>

    <div class="container">
        <table class="table">
            <legend>LISTADO</legend>
            <thead>
            <th>Activo</th>
            <th>Nombre</th>
            <th>Accion</th>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->activo }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ HTML::link('/admin/categorias/editar/'.$categoria['id'], 'MODIFICAR') }}</td>
                    <td>
                        <button  data-toggle="modal" data-target="#modal_{{ $categoria['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
                    </td>

                </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>



    <!-- VENTANA MODAL CREAR CATEGORIA -->
    <div id="nueva_categoria" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Nueva categoria</h4>
                </div>
                <div class="modal-body">
                    <div id="add_categoria" class="add_from_admin dialog_form" title="Nueva tienda">

                        {{ Form::open(array(
                            'url' => '/admin/categorias/nueva',
                            'method' => 'post',
                            'action' => 'CategoriasController@nueva',
                            'id' => 'nuevaCategoriaForm'
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
    <!-- FIN VENTANA MODAL CREAR CATEGORIA -->


    <!-- CONFIRMACIONES BORRAR CATEGORIA -->
    @foreach($categorias as $categoria)
        <div id="modal_{{ $categoria->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                        <h4 class="modal-title">Borrar '{{ $categoria['nombre'] }}'</h4>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de querer borrar la categoria '{{ $categoria['nombre'] }}'?<br/>
                        {{ HTML::link('/admin/categorias/eliminar/'.$categoria['id'], 'SI') }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                <!-- FIN CONFIRMACIONES BORRAR CATEGORIA -->





@stop

@stop