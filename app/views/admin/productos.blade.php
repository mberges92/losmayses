@extends('layout_admin')
@section('titulo') Administracion - Productos @stop


@section('content')



    <div class="container">
        <div class="col-sm-12 col-md-6">
            <b>FORMULARIO CREAR PRODUCTO</b>
            {{ Form::open(array(
                'url' => '/admin/productos/nuevo',
                'method' => 'post',
                'action' => 'ProductosController@nuevo')) }}

            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', '', array('class' => 'form-control')) }}

            {{ Form::label('cantidad_minima', 'Cantidad minima de compra') }}
            {{ Form::text('cantidad_minima', '', array('class' => 'form-control')) }}

            {{ Form::label('iva', 'IVA') }}
            {{ Form::text('iva', '', array('class' => 'form-control')) }}

            {{ Form::label('precio_total', 'Precio Unidad/Pack') }}
            {{ Form::text('precio_total', '', array('class' => 'form-control')) }}

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
            <th>Cantidad minima</th>
            <th>IVA</th>
            <th>Precio Unidad o Pack</th>
            <th>Accion</th>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->activo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad_minima }}</td>
                    <td>{{ $producto->iva }}</td>
                    <td>{{ $producto->precio_total }}</td>
                    <td>MODIFICAR / ELIMINAR PRODUCTO</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>

@stop