@extends('layout_admin')
@section('titulo') Administracion - Productos @stop


@section('content')



    <div class="container">
        <div class="col-sm-12 col-md-6">
            <b>FORMULARIO CREAR PRODUCTO</b>
            {{ Form::open(array(
                'url' => '/admin/productos/nueva',
                'method' => 'post',
                'action' => 'ProductosController@nuevo')) }}

            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', '', array('class' => 'form-control')) }}

            {{ Form::label('cantidad_por_unidad', 'Cantidad de unidades en pack') }}
            {{ Form::text('cantidad_por_unidad', '', array('class' => 'form-control')) }}

            {{ Form::label('precio_unidad', 'Precio Unidad/Pack') }}
            {{ Form::text('precio_unidad', '', array('class' => 'form-control')) }}

            <br/>

            {{ Form::submit('Enviar') }}

            {{ Form::close() }}

        </div>
    </div>

    <hr/>





    <div class="container">
        <table class="table">
            <legend>LISTADO</legend>
            <thead>
            <th>Activo</th>
            <th>Nombre</th>
            <th>Cantidad por unidad</th>
            <th>Precio Unidad</th>
            <th>Accion</th>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->activo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad_por_unidad }}</td>
                    <td>{{ $producto->precio_unidad }}</td>
                    <td>MAS DATOS / ELIMINAR PRODUCTO</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>

@stop