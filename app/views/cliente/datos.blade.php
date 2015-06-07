@extends('layout_cliente')
@section('titulo') Cliente - Datos @stop


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Mis datos</h1>
        </div>
    </div>



    <div class="row">

        <div class="col-md-12 col-lg-8">




            {{ Form::open(array(
                'url' => '/cliente/'.$cliente->id.'/datos',
              'method' => 'post',
              'action' => 'UsuariosController@datos_cliente',
              'id' => 'formDatosCliente')) }}

            <div class="form-group">
            {{ Form::label('correo', 'Correo') }}
            {{ Form::text('correo', $cliente->correo, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::text('password', '', array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('nombre_empresa', 'Nombre de su empresa') }}
            {{ Form::text('nombre_empresa', $cliente->nombre_empresa, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('nombre_contacto', 'Nombre de contacto') }}
            {{ Form::text('nombre_contacto', $cliente->nombre_contacto, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion', $cliente->direccion, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('telefono1', 'Telefono 1') }}
            {{ Form::text('telefono1', $cliente->telefono1, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('telefono2', 'Telefono 2') }}
            {{ Form::text('telefono2', $cliente->telefono2, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('codigo_postal', 'Código postal') }}
            {{ Form::text('codigo_postal', $cliente->codigo_postal, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Guardar', array('class' => 'btn btn-primary btn-success btn-block btn-lg')) }}
            </div>

            <br/>



            {{ Form::close() }}



        </div>


    </div>



    <script>

        $(document).ready(function() {




                $('#formDatosCliente').validate({
                    rules: {
                        correo: {
                            required: true,
                            email: true,
                            minlength: 5,
                            maxlength: 255,
                            remote: "http://"+location.host+"/losmayses/public/validation/comprobar_correo/{{ $cliente->id }}"
                        },
                        password: {
                            minlength: 6,
                            maxlength: 255
                        },
                        nombre_empresa: {
                            required: true,
                            minlength: 1,
                            maxlength: 255
                        },
                        nombre_contacto: {
                            required: true,
                            minlength: 1,
                            maxlength: 255
                        },
                        direccion: {
                            required: true,
                            minlength: 4,
                            maxlength: 255
                        },
                        telefono1: {
                            required: true,
                            digits: true,
                            minlength: 9,
                            maxlength: 9
                        },
                        telefono2: {
                            digits: true,
                            minlength: 9,
                            maxlength: 9
                        },
                        codigo_postal: {
                            required: true,
                            digits: true,
                            minlength: 5,
                            maxlength: 5
                        }
                    } // FIN DE RULES

                });



        });

    </script>


@stop