@extends('layout_admin')
@section('titulo') Administracion - Tarifas @stop


@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Tarifas</h1>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
    <a href="#"><button class="btn btn-primary btn-lg btn-success" data-toggle="modal" data-target="#nueva_tarifa">Nueva Tarifa</button></a>
    </div>
</div>

<br/>


<div class="row">

    <div class="col-md-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Listado de tarifas
            </div>

            <div class="panel-body">

                <div class="table-responsive">

                <table class="table table-hover">
                    <thead>
                    <th>Nombre</th>
                    <th>Valor</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                    @foreach($tarifas as $tarifa)
                        <tr>
                            <td>{{ $tarifa->nombre }}</td>
                            <td>{{ $tarifa->signo.'  '.$tarifa->valor }} %</td>
                            <td>{{ HTML::link('/admin/tarifas/editar/'.$tarifa['id'], 'MODIFICAR', array('class' => 'btn btn-primary btn-sm')) }}</td>
                            <td>{{ HTML::link('/admin/tarifas/eliminar/'.$tarifa['id'], 'ELIMINAR', array('class' => 'btn btn-primary btn-sm btn-warning')) }}</td>
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
                            {{ Form::select('signo', array('+' => '+', '-' => '-'), null, array('class' => 'form-control')) }}
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
        $(document).ready(function() {


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


        });


    </script>



    
    


@stop