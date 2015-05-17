@extends('layout_admin')
@section('titulo') Administracion - Usuarios @stop


@section('content')


<div class="container">
    <table class="table">
        <legend>LISTADO</legend>
        <thead>
        <th>Activo</th>
        <th>Nombre de cliente</th>
        <th>Correo</th>
        <th>Empresa</th>
        <th>Tarifa</th>
        <th>Accion</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->activo }}</td>
            <td>{{ $usuario->nombre_contacto }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->nombre_empresa }}</td>
@foreach($tarifas as $tarifa)
            @if($usuario->tarifa_id == $tarifa->id)
            <td>{{ $tarifa->nombre }}</td>
                @break
            @endif
@endforeach

            <td>{{ HTML::link('/admin/clientes/editar/'.$usuario['id'], 'MODIFICAR') }}</td>
            <td>
                <button  data-toggle="modal" data-target="#modal_{{ $usuario['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>

    </table>
</div>






<!-- CONFIRMACIONES BORRAR CLIENTE -->
@foreach($usuarios as $usuario)
    <div id="modal_{{ $usuario->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Borrar '{{ $usuario['nombre_contacto'] }}'</h4>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de querer borrar el cliente '{{ $usuario['nombre_contacto'] }}'?<br/>
                    {{ HTML::link('/admin/clientes/eliminar/'.$usuario['id'], 'SI') }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
            <!-- FIN CONFIRMACIONES BORRAR CLIENTE -->



@stop