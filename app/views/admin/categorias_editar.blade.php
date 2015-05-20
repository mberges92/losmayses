@extends('layout_admin')
@section('titulo') Administracion - Categorias Editar @stop


@section('content')

<div class="container">

    <b>FORMULARIO EDITAR CATEGORIA</b>
    {{ Form::open(array(
        'url' => '/admin/categorias/editar/'.$categoria['id'],
        'method' => 'post',
        'action' => 'CategoriasController@modificar')) }}

    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', $categoria['nombre'], array('class' => 'form-control')) }}

    <br/>

    {{ Form::submit('Enviar') }}

    {{ Form::close() }}

</div>


@stop

