@extends('layout_admin')
@section('titulo') Administracion - Editar Usuario @stop


@section('content')


<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Clientes > Modificar cliente</h1>
    </div>
</div>



<div class="row">


    <div class="col-md-12 col-lg-8">

        {{ Form::open(array(
            'url' => '/admin/clientes/editar/'.$usuario[0]['id'],
            'method' => 'post',
            'action' => 'UsuariosController@modificar',
            'id' => 'editarUsuarioForm',
            'role' => 'form')) }}

        <br/>
        <div class="form-group">
            {{ Form::label('correo', 'Correo') }}
            {{ Form::text('correo', $usuario[0]['correo'], array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::text('password', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
        {{ Form::label('nombre_empresa', 'Nombre de su empresa') }}
        {{ Form::text('nombre_empresa', $usuario[0]['nombre_empresa'], array('class' => 'form-control')) }}
</div>

        <div class="form-group">
        {{ Form::label('nombre_contacto', 'Nombre de contacto') }}
        {{ Form::text('nombre_contacto', $usuario[0]['nombre_contacto'], array('class' => 'form-control')) }}
</div>

        <div class="form-group">
        {{ Form::label('direccion', 'Direccion') }}
        {{ Form::text('direccion', $usuario[0]['direccion'], array('class' => 'form-control')) }}
</div>

        <div class="form-group">
        {{ Form::label('telefono1', 'Telefono 1') }}
        {{ Form::text('telefono1', $usuario[0]['telefono1'], array('class' => 'form-control')) }}
</div>

        <div class="form-group">
        {{ Form::label('telefono2', 'Telefono 2') }}
        {{ Form::text('telefono2', $usuario[0]['telefono2'], array('class' => 'form-control')) }}
</div>

        <div class="form-group">
        {{ Form::label('codigo_postal', 'Código postal') }}
        {{ Form::text('codigo_postal', $usuario[0]['codigo_postal'], array('class' => 'form-control')) }}
</div>
        <br/>
        <div class="form-group">
        {{ Form::select('rol', ['cliente', 'admin'], null,  array('class' => 'form-control')) }}
</div>
        <div class="form-group">
        {{ Form::select('tarifa', $alltarifas, null, array('class' => 'form-control')) }}
</div>



        {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary btn-success btn-block btn-lg')) }}

        {{ Form::close() }}

    </div>


</div>

<br/>


    <script>

        $(document).ready(function() {

            $('#editarUsuarioForm').validate({
                rules: {
                    correo: {
                        required: true,
                        email: true,
                        minlength: 5,
                        maxlength: 255,
                        remote: "http://"+location.host+"/losmayses/public/validation/comprobar_correo/{{ $usuario[0]['id'] }}"
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