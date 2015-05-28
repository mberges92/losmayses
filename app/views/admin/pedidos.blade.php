@extends('layout_admin')
@section('titulo') Administracion - Pedidos @stop


@section('content')

{{-- dd($pedidos[0]) --}}
    <div class="container">
        <table class="table">
            <legend>LISTADO PEDIDOS</legend>
            <thead>
            <th>Empresa</th>
            <th>Fecha pedido</th>
            <th>Fecha entrega</th>
            <th>Estado</th>
            <th>Ver</th>
            <th>Borrar</th>
            <th>Estado</th>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido['usuario']['nombre_empresa'] }}</td>
                    <td>{{ $pedido['fechaPedido'] }}</td>
                    <td>{{ $pedido['fechaEntrega'] }}</td>
                    <td>
                        @if ($pedido['estado'] == 1)
                            PENDIENTE
                        @elseif($pedido['estado'] == 2)
                            EN PROCESO
                        @elseif($pedido['estado'] == 3)
                            PREPARADO
                        @elseif($pedido['estado'] == 4)
                            EN REPARTO
                        @endif
                    </td>
                    <td>
                        {{ HTML::link('/admin/pedidos/ver/'.$pedido['id'], 'VER') }}
                    </td>
                    <td>
                        <button  data-toggle="modal" data-target="#modal_{{ $pedido['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
                    </td>
                    <td>
                        {{ HTML::link('/admin/pedidos/cambiar_estado/'.$pedido['id'], 'CAMBIAR ESTADO') }}
                    </td>
                    {{--

                    <td>{{ $pedido[''] }}</td>
                    <td>{{ $pedido->precio_total }}</td>
                    <td>{{ HTML::link('/admin/productos/editar/'.$pedido['id'], 'MODIFICAR') }}</td>
                    <td>
                        <button  data-toggle="modal" data-target="#modal_{{ $pedido['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
                    </td>

                    --}}
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>





<!-- CONFIRMACIONES BORRAR PEDIDO -->
@foreach($pedidos as $pedido)
    <div id="modal_{{ $pedido['id'] }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Borrar '{{ $pedido['usuario']['nombre_empresa'] }}'</h4>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de querer borrar el pedido '{{ $pedido['usuario']['nombre_empresa'] }}'?<br/>
                    {{ HTML::link('/admin/pedidos/eliminar/'.$pedido['id'], 'SI') }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
            <!-- FIN CONFIRMACIONES BORRAR PEDIDO -->




@stop