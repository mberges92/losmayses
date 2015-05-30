@extends('layout_admin')
@section('titulo') Administracion - Tarifas @stop


@section('content')

    <div class="container">

        <b>FORMULARIO EDITAR TARIFA</b>
        {{ Form::open(array(
            'url' => '/admin/tarifas/editar/'.$tarifa['id'],
            'method' => 'post',
            'action' => 'TarifasController@modificar',
            'id' => 'editarTarifaForm')) }}

        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $tarifa['nombre'], array('class' => 'form-control')) }}
        <br/>

        {{ Form::label('signo', 'AUMENTO O DESCUENTO SOBRE PRODUCTOS') }} <br/>
        {{ Form::select('signo', array('+' => '+', '-' => '-'), array('class' => 'form-control')) }}
        <br/><br/>

        {{ Form::label('valor', 'Valor') }}
        {{ Form::text('valor', $tarifa['valor'], array('class' => 'form-control')) }}

        <br/>

        {{ Form::submit('Enviar') }}

        {{ Form::close() }}

    </div>


    <script>

        $('#editarTarifaForm').validate({
            rules: {
                nombre: {
                    required: true,
                    maxlength: 255,
                    remote: "http://"+location.host+"/losmayses/public/validation/comprobar_tarifa/{{$tarifa['id']}}"
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