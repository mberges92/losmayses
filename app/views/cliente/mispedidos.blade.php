@extends('layout_cliente')
@section('titulo') Cliente - Mis Pedidos @stop


@section('content')





    <div class="row">

        <div class="col-md-12">
            <h1 class="page-header">Mis últimos 10 pedidos</h1>
        </div>

    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Listado de pedidos
                </div>

                <div class="panel-body">

                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                            <th>Tienda</th>
                            <th>Fecha pedido</th>
                            <th>Fecha entrega</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            </thead>
                            <tbody>


                            @foreach($pedidos as $pedido)
                                <tr>

                                        @foreach($tiendas as $tienda)

                                            @if($pedido['tienda_id'] == $tienda['id'])
                                                <td id="{{ $pedido['id'] }}">{{ $tienda['nombre'] }}</td>                                                @break
                                            @endif
                                        @endforeach

                                    <td>{{ date("d-m-Y", strtotime($pedido['fechaPedido'])) }}</td>
                                    <td>{{ date("d-m-Y", strtotime($pedido['fechaEntrega'])) }}</td>
                                    <td id="{{$pedido['estado']}}">
                                        @if ($pedido['estado'] == 1)
                                            PENDIENTE
                                        @elseif($pedido['estado'] == 2)
                                            PREPARADO
                                        @elseif($pedido['estado'] == 3)
                                            COMPLETADO
                                        @endif
                                    </td>
                                    <td>
                                        {{ HTML::link('/cliente/'.Auth::User()->id.'/pedidos/ver/'.$pedido['id'], 'VER', array('class' => 'btn btn-primary btn-sm')) }}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>


@stop