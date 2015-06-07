@extends('layout_admin')
@section('titulo') Administracion - Tarifas @stop


@section('content')


    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Tarifas > Modificar tarifa</h1>
        </div>
    </div>



    <div class="row">

        <div class="col-md-12 col-lg-8">

            {{ Form::open(array(
                        'url' => '/admin/tarifas/editar/'.$tarifa['id'],
                        'method' => 'post',
                        'action' => 'TarifasController@modificar',
                        'id' => 'editarTarifaForm')) }}

            <div class="form-group">

            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $tarifa['nombre'], array('class' => 'form-control')) }}
</div>
            <div class="form-group">

            {{ Form::label('signo', 'AUMENTO O DESCUENTO SOBRE PRODUCTOS') }} <br/>
            {{ Form::select('signo', array('+' => '+', '-' => '-'), null, array('class' => 'form-control')) }}
</div>
            <div class="form-group">
            {{ Form::label('valor', 'Valor') }}
            {{ Form::text('valor', $tarifa['valor'], array('class' => 'form-control')) }}
</div>


            {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary btn-success btn-block btn-lg')) }}

            {{ Form::close() }}



        </div>

    </div>



    <script>
        $(document).ready(function() {

            $('#editarTarifaForm').validate({
                rules: {
                    nombre: {
                        required: true,
                        maxlength: 255,
                        remote: "http://" + location.host + "/losmayses/public/validation/comprobar_tarifa/{{$tarifa['id']}}"
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