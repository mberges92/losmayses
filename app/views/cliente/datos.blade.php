@extends('layout_cliente')
@section('titulo') Cliente - Datos @stop


@section('content')

    <div class="container">
        <div class="col-sm-12 col-md-6">
            <b>MIS DATOS</b>
            {{ Form::open(array(
                'url' => '/cliente/'.$cliente->id.'/datos',
                'method' => 'post',
                'action' => 'UsuariosController@datos_cliente')) }}

            {{ Form::label('correo', 'Correo') }}
            {{ Form::text('correo', $cliente->correo, array('class' => 'form-control')) }}

            {{ Form::label('password', 'Contraseña') }}
            {{ Form::text('password', '', array('class' => 'form-control')) }}

            {{ Form::label('nombre_empresa', 'Nombre de su empresa') }}
            {{ Form::text('nombre_empresa', $cliente->nombre_empresa, array('class' => 'form-control')) }}

            {{ Form::label('nombre_contacto', 'Nombre de contacto') }}
            {{ Form::text('nombre_contacto', $cliente->nombre_contacto, array('class' => 'form-control')) }}

            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion', $cliente->direccion, array('class' => 'form-control')) }}

            {{ Form::label('telefono1', 'Telefono 1') }}
            {{ Form::text('telefono1', $cliente->telefono1, array('class' => 'form-control')) }}

            {{ Form::label('telefono2', 'Telefono 2') }}
            {{ Form::text('telefono2', $cliente->telefono2, array('class' => 'form-control')) }}

            {{ Form::label('codigo_postal', 'Código postal') }}
            {{ Form::text('codigo_postal', $cliente->codigo_postal, array('class' => 'form-control')) }}


            <br/>

            {{ Form::submit('Guardar') }}

            {{ Form::close() }}

        </div>
    </div>



@stop