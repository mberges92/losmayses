@extends('layout_admin')
@section('titulo') Administracion - Tiendas @stop


@section('content')
    <div class="container">
    <div class="col-sm-12 col-md-6">

        <b>FORMULARIO CREAR TIENDA</b>

{{ Form::open(array(
    'url' => '/admin/tiendas/nueva',
    'method' => 'post',
    'action' => 'TiendasController@nuevas')) }}

    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', '', array('class' => 'form-control')) }}

    {{ Form::label('direccion', 'Direccion') }}
    {{ Form::text('direccion', '', array('class' => 'form-control')) }}

    {{ Form::label('cif', 'CIF') }}
    {{ Form::text('cif', '', array('class' => 'form-control')) }}

    {{ Form::label('telefono_1', 'Telefono 1') }}
    {{ Form::text('telefono_1', '', array('class' => 'form-control')) }}

    {{ Form::label('telefono_2', 'Telefono 2') }}
    {{ Form::text('telefono_2', '', array('class' => 'form-control')) }}

    {{ Form::label('correo', 'Correo') }}
    {{ Form::text('correo', '', array('class' => 'form-control')) }}

    {{ Form::label('provincia', 'Provincia') }}
    {{ Form::text('provincia', '', array('class' => 'form-control')) }}

    {{ Form::label('localidad', 'Localidad') }}
    {{ Form::text('localidad', '', array('class' => 'form-control')) }}

    {{ Form::label('cod_postal', 'Codigo postal') }}
    {{ Form::text('cod_postal', '', array('class' => 'form-control')) }}
    <br/>
    {{ Form::submit('Enviar') }}

{{ Form::close() }}

</div>
</div>

    <hr/>

<div class="container">
    <table class="table">
        <legend>LISTADO, (ESTO VA EN LA PARTE DE CLIENTES)</legend>
        <thead>
        <th>Activo</th>
        <th>Tienda</th>
        <th>Correo</th>
        <th>Direccion</th>
        <th>Accion</th>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
            <tr>
                <td>{{ $tienda->activo }}</td>
                <td>{{ $tienda->nombre }}</td>
                <td>{{ $tienda->correo }}</td>
                <td>{{ $tienda->direccion }}</td>
                <td>MAS DATOS / ELIMINAR TIENDA</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>

    </table>
</div>



@stop