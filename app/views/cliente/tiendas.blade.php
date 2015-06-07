@extends('layout_cliente')
@section('titulo') Cliente - Tiendas @stop


@section('content')



    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Tiendas</h1>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            <a href="#"><button class="btn btn-primary btn-lg btn-success" data-toggle="modal" data-target="#nueva_tienda">Nueva Tienda</button></a>
        </div>
    </div>

    <br/>




    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Listado de tiendas
                </div>

                <div class="panel-body">

                    <div class="table-responsive">


                    <table class="table">
                    <thead>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Localidad</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                    @foreach($tiendas as $tienda)
                        <tr>
                            <td>{{ $tienda['nombre'] }}</td>
                            <td>{{ $tienda['direccion'] }}</td>
                            <td>{{ $tienda['telefono_1'] }}</td>
                            <td>{{ $tienda['localidad'] }}</td>
                            <td>{{ HTML::link('/cliente/'.Auth::user()->id.'/tiendas/'.$tienda['id'], 'MODIFICAR', array('class' => 'btn btn-primary btn-sm')) }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-warning" data-toggle="modal" data-target="#modal_{{ $tienda['id'] }}"> <i class="fa fa-times ">ELIMINAR</i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>

                    </div>
                </div>
            </div>

        </div>

    </div>





<!-- VENTANA MODAL CREAR TIENDA -->
    <div id="nueva_tienda" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Nueva tienda</h4>
                </div>
                <div class="modal-body">
                    <div id="add_tienda" class="add_from_admin dialog_form" title="Nueva tienda">

                        {{ Form::open(array(
                            'url' => '/cliente/'.Auth::user()->id.'/tiendas/nueva',
                            'method' => 'post',
                            'action' => 'TiendasController@nueva_tienda',
                            'id' => 'nuevaTiendaForm'
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
<!-- FIN VENTANA MODAL CREAR TIENDA -->




<!-- CONFIRMACIONES BORRAR TIENDAS -->
    @foreach($tiendas as $tienda)
        <div id="modal_{{ $tienda['id'] }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                        <h4 class="modal-title">Borrar '{{ $tienda['nombre'] }}'</h4>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de querer borrar la tienda '{{ $tienda['nombre'] }}'?<br/>
                        {{ HTML::link('/cliente/'.Auth::user()->id.'/tiendas/eliminar/'.$tienda['id'], 'SI') }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- FIN CONFIRMACIONES BORRAR TIENDAS -->


        <script>
            $(document).ready(function() {

                    $('#nuevaTiendaForm').validate({
                        rules: {
                            nombre: {
                                required: true,
                                minlength: 1,
                                maxlength: 255,
                                remote: "http://" + location.host + "/losmayses/public/validation/comprobar_nuevaTienda/{{ Auth::user()->id }}"
                            }
                        }
                    });

            });

        </script>

@stop