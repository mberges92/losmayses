@extends('layout_cliente')
@section('titulo') Cliente - Tiendas @stop


@section('content')



    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Tiendas > Modificar tienda</h1>
        </div>
    </div>



    <div class="row">

        <div class="col-md-12 col-lg-8">

            {{ Form::open(array(
                'url' => '/cliente/'.Auth::user()->id.'/tiendas/'.$tienda->id,
                'method' => 'post',
                'action' => 'TiendasController@modificar_tienda',
                'id' => 'modificarTiendaForm'
                )) }}



            <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $tienda->nombre, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion', $tienda->direccion, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('cif', 'CIF') }}
            {{ Form::text('cif', $tienda->cif, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('telefono_1', 'Telefono 1') }}
            {{ Form::text('telefono_1', $tienda->telefono_1, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('telefono_2', 'Telefono 2') }}
            {{ Form::text('telefono_2', $tienda->telefono_2, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('correo', 'Correo') }}
            {{ Form::text('correo', $tienda->correo, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('provincia', 'Provincia') }}
            {{ Form::text('provincia', $tienda->provincia, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('localidad', 'Localidad') }}
            {{ Form::text('localidad', $tienda->localidad, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('cod_postal', 'Codigo postal') }}
            {{ Form::text('cod_postal', $tienda->cod_postal, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{Form::submit('Guardar cambios', array('class' => 'btn btn-primary btn-success btn-block btn-lg'))}}

            </div>

            {{ Form::close() }}

        </div>

    </div>




    <script>

        $(document).ready(function() {



                $('#modificarTiendaForm').validate({
                    rules: {
                        nombre: {
                            required: true,
                            minlength: 1,
                            maxlength: 255,
                            remote: "http://"+location.host+"/losmayses/public/validation/comprobar_tienda/{{ $tienda->id }}"
                        },
                        direccion: {
                            required: true,
                            minlength: 1,
                            maxlength: 255
                        },
                        cif: {
                            required: true,
                            cifES: true
                        },
                        telefono_1: {
                            required: true,
                            digits: true,
                            minlength: 9,
                            maxlength: 9
                        },
                        telefono_2: {
                            digits: true,
                            minlength: 9,
                            maxlength: 9
                        },
                        correo: {
                            required: true,
                            email: true,
                            minlength: 5,
                            maxlength: 255
                        },
                        provincia: {
                            required: true,
                            minlength: 1,
                            maxlength: 255
                        },
                        localidad: {
                            required: true,
                            minlength: 1,
                            maxlength: 255
                        },
                        cod_postal: {
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
