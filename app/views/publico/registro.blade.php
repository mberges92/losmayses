@extends('layout')
@section('titulo') Registro @stop


@section('content')

    {{ HTML::link('/', 'volver'); }}
    <h1>Crear Usuario</h1>
    {{ Form::open(array('url' => '/registro', 'id' => 'registroFormulario')) }}

    {{ Form::label('correo', 'Email') }}
    {{ Form::email('correo') }}
    <br>
    {{Form::label('password', 'Contraseña')}}
    {{Form::text('password', '')}}

    Esto solo se ve en pruebas
    <br/>
    {{Form::label('rol', 'Rol')}}
    {{Form::select('rol', array('admin' => 'admin', 'cliente' => 'cliente')) }}
    <br>
    {{Form::submit('Registrar usuario')}}
    {{ Form::close() }}


    <script>

        $(document).ready(function() {
            $('#registroFormulario').validate({
                rules: {
                    correo: {
                        required: true,
                        email: true,
                        minlength: 5,
                        maxlength: 255,
                        remote: "http://" + location.host + "/losmayses/public/validation/comprobar_newCorreo"
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 255
                    }
                } // FIN DE RULES

            });

        });
    </script>

@stop