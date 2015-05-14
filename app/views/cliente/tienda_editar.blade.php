@extends('layout_cliente')
@section('titulo') Cliente - Tiendas @stop


@section('content')

    <hr/>

    <div class="container">
    {{ Form::open(array(
    'url' => '/cliente/'.Auth::user()->id.'/tiendas/'.$tienda->id,
    'method' => 'post',
    'action' => 'TiendasController@modificar_tienda',
    'id' => 'modificarTiendaForm'
    )) }}



    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre', $tienda->nombre, array('class' => 'form-control')) }}

    {{ Form::label('direccion', 'Direccion') }}
    {{ Form::text('direccion', $tienda->direccion, array('class' => 'form-control')) }}

    {{ Form::label('cif', 'CIF') }}
    {{ Form::text('cif', $tienda->cif, array('class' => 'form-control')) }}

    {{ Form::label('telefono_1', 'Telefono 1') }}
    {{ Form::text('telefono_1', $tienda->telefono_1, array('class' => 'form-control')) }}

    {{ Form::label('telefono_2', 'Telefono 2') }}
    {{ Form::text('telefono_2', $tienda->telefono_2, array('class' => 'form-control')) }}

    {{ Form::label('correo', 'Correo') }}
    {{ Form::text('correo', $tienda->correo, array('class' => 'form-control')) }}

    {{ Form::label('provincia', 'Provincia') }}
    {{ Form::text('provincia', $tienda->provincia, array('class' => 'form-control')) }}

    {{ Form::label('localidad', 'Localidad') }}
    {{ Form::text('localidad', $tienda->localidad, array('class' => 'form-control')) }}

    {{ Form::label('cod_postal', 'Codigo postal') }}
    {{ Form::text('cod_postal', $tienda->cod_postal, array('class' => 'form-control')) }}
    <br/>

    <div class="submit">
        {{Form::submit('Guardar', array('class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}
    </div>

@stop
