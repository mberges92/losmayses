@extends('layout_admin')
@section('titulo') Administracion - Categorias Editar @stop


@section('content')



    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Categorías > Modificar categoría</h1>
        </div>
    </div>



    <div class="row">

        <div class="col-md-12 col-lg-8">


            {{ Form::open(array(
                    'url' => '/admin/categorias/editar/'.$categoria['id'],
                    'method' => 'post',
                    'action' => 'CategoriasController@modificar',
                    'id' => 'editarCategoriaForm')) }}


            <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $categoria['nombre'], array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary btn-success btn-block btn-lg')) }}
            </div>

            {{ Form::close() }}


        </div>


    </div>



<script>

    $('#editarCategoriaForm').validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 255,
                remote: "http://"+location.host+"/losmayses/public/validation/comprobar_categoria/{{$categoria['id']}}"
            }
        } // FIN DE RULES

    });

</script>


@stop
