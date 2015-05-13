@extends('layout_admin')
@section('titulo') Administracion - Usuarios @stop


@section('content')


<div class="container">
    <table class="table">
        <legend>LISTADO</legend>
        <thead>
        <th>Activo</th>
        <th>Nombre de contacto</th>
        <th>Correo</th>
        <th>Empresa</th>
        <th>Accion</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->activo }}</td>
            <td>{{ $usuario->nombre_contacto }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->nombre_empresa }}</td>
            <td>EDITAR / ELIMINAR</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>

    </table>
</div>



@stop