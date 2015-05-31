@extends('layout_admin')
@section('titulo') Administracion - Tarifas @stop


@section('content')


    <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#nueva_tarifa">Nueva Tarifa</button></a>


    <hr/>

<div class="container">
    <table class="table">
        <legend>LISTADO</legend>
        <thead>
        <th>Nombre</th>
        <th>Valor</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </thead>
        <tbody>
        @foreach($tarifas as $tarifa)
            <tr>
                <td>{{ $tarifa->nombre }}</td>
                <td>{{ $tarifa->signo.'  '.$tarifa->valor }} %</td>
                <td>{{ HTML::link('/admin/tarifas/editar/'.$tarifa['id'], 'EDITAR') }}</td>
                <td>{{ HTML::link('/admin/tarifas/eliminar/'.$tarifa['id'], 'ELIMINAR') }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>

    </table>
</div>


    <!-- VENTANA MODAL CREAR TARIFA -->
    <div id="nueva_tarifa" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Nueva tarifa</h4>
                </div>
                <div class="modal-body">
                    <div id="add_tarifa" class="add_from_admin dialog_form" title="Nueva tarifa">

                        {{ Form::open(array(
                            'url' => '/admin/tarifas/nueva',
                            'method' => 'post',
                            'action' => 'TarifasController@nueva',
                            'id' => 'nuevaTarifaForm'
                            )) }}

                        <div class="form-group required">
                            {{ Form::label('nombre', 'Nombre') }}
                            {{ Form::text('nombre', '', array('class' => 'form-control')) }}
                        </div>
                        <br/>
                        <div class="form-group">
                            {{ Form::label('signo', 'AUMENTO O DESCUENTO SOBRE PRODUCTOS') }} <br/>
                            {{ Form::select('signo', array('+' => '+', '-' => '-'), array('class' => 'form-control')) }}
                        </div>
                        <br/>
                        <div class="form-group">
                            {{ Form::label('valor', 'Valor') }}
                            {{ Form::text('valor', '', array('class' => 'form-control')) }}
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
    <!-- FIN VENTANA MODAL CREAR TARIFA -->


    <script>

        $('#nuevaTarifaForm').validate({
            rules: {
                nombre: {
                    required: true,
                    maxlength: 255,
                    remote: "http://"+location.host+"/losmayses/public/validation/comprobar_newTarifa"
                },
                valor: {
                    required: true,
                    digits: true,
                    maxlength: 5
                }
            } // FIN DE RULES

        });

    </script>



    
    


@stop