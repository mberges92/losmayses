@extends('layout_admin')
@section('titulo') Administracion - Usuarios @stop


@section('content')


<div class="container">
    <table class="table">
        <legend>LISTADO</legend>
        <thead>
        <th>Activo</th>
        <th>Nombre Usuario</th>
        <th>Correo</th>
        <th>Fecha creacion</th>
        <th>Accion</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->activo }}</td>
            <td>{{ $usuario->username }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->created_at }}</td>
            <td>EDITAR / ELIMINAR</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>

    </table>
</div>



@stop