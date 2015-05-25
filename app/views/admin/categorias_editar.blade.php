@extends('layout_admin')
@section('titulo') Administracion - Categorias Editar @stop


@section('content')

<div class="container">

    <b>FORMULARIO EDITAR CATEGORIA</b>
    {{ Form::open(array(
        'url' => '/admin/categorias/editar/'.$categoria['id'],
        'method' => 'post',
        'action' => 'CategoriasController@modificar',
        'id' => 'editarCategoriaForm')) }}

    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', $categoria['nombre'], array('class' => 'form-control')) }}

    <br/>

    {{ Form::submit('Enviar') }}

    {{ Form::close() }}

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
