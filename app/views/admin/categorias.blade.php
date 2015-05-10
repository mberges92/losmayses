@extends('layout_admin')
@section('titulo') Administracion - Categorias @stop


@section('content')


    <div class="container">
        <div class="col-sm-12 col-md-6">
            <b>FORMULARIO CREAR CATEGORIA</b>
            {{ Form::open(array(
                'url' => '/admin/categorias/nueva',
                'method' => 'post',
                'action' => 'CategoriasController@nuevas')) }}

            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', '', array('class' => 'form-control')) }}

            {{-- Form::label('signo', 'Signo +/-') }}
            {{ Form::text('signo', '', array('class' => 'form-control')) }}

            {{ Form::label('valor', 'Valor') }}
            {{ Form::text('valor', '', array('class' => 'form-control')) --}}

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
            <th>Valor</th>
            <th>Accion</th>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->activo }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->signo.'  '.$tarifa->valor }}</td>
                    <td>MODIFICAR / ELIMINAR</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>





@stop

@stop