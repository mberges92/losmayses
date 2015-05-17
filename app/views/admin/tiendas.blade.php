@extends('layout_admin')
@section('titulo') Administracion - Tiendas @stop


@section('content')

<div class="container">
    <table class="table">
        <legend>LISTADO DE TIENDAS EN EL SISTEMA</legend>
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