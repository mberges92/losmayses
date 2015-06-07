@extends('layout_admin')
@section('titulo') Administracion - Pedidos @stop


@section('content')


    <div class="row">

        <div class="col-md-12">
            <h1 class="page-header">Pedidos</h1>
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
                                        <td id="{{ $pedido['id'] }}">{{ $pedido['usuario']['nombre_empresa'] }}</td>
                                        <td>{{ $pedido['fechaPedido'] }}</td>
                                        <td>{{ $pedido['fechaEntrega'] }}</td>
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
                                            {{ HTML::link('/admin/pedidos/ver/'.$pedido['id'], 'VER', array('class' => 'btn btn-primary btn-sm')) }}
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm btn-warning" data-toggle="modal" data-target="#modal_{{ $pedido['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm btn-success" id="cambiarEstadoBoton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEstado">CAMBIAR ESTADO</button>
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



    <div class="container">
        <div class="row">

            <div id="modalEstado" class="modal fade in">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                            <h4 class="modal-title">Cambiar estado del pedido</h4>
                        </div>
                        <div class="modal-body">

                                <span id="m_id" style="display: none"></span>

                                <div class="funkyradio">
                                    <div class="funkyradio-success">
                                        <input type="radio" name="radio" id="radio1" />
                                        <label id="1" for="radio1">PENDIENTE</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="radio" name="radio" id="radio2" />
                                        <label id="2" for="radio2">PREPARADO + ALBARAN</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="radio" name="radio" id="radio3" />
                                        <label id="3" for="radio3">COMPLETADO, ALBARAN + FACTURA</label>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button id="guardarEstadoPedido" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Guardar</button>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->

        </div>
    </div>


    <script>
        $(document).ready(function() {

            $(document).on('click', '#cambiarEstadoBoton', function() {
                var $td = $(this).closest('tr').children('td');
                var idpedidofila = $td.eq(0).attr('id');
                var idestadofila = $td.eq(3).attr('id');

                if (idestadofila == 1) {
                    $('#radio1').prop('checked', true);
                } else if (idestadofila == 2) {
                    $('#radio2').prop('checked', true);
                } else if (idestadofila == 3) {
                    $('#radio3').prop('checked', true);
                } else if (idestadofila == 4) {
                    $('#radio4').prop('checked', true);
                } else if (idestadofila == 5) {
                    $('#radio5').prop('checked', true);
                }

                $('#m_id').text(idpedidofila);

            }); // ASIGNAR CHECKED A RADIO BUTTONS SEGUN SU ESTADO ACTUAL


            $('#guardarEstadoPedido').click(function() {

                var idpedido_enModal = $('#m_id').text();
                var newEstadopedido = $('input[type="radio"]:checked').parent().find('label').attr('id');

                //alert(newEstadopedido);


                $objDatosPedido = [];

                dat = {};

                dat['idPedido'] = idpedido_enModal;
                dat['estadoPedido'] = newEstadopedido;

                $objDatosPedido.push(dat);




                $.ajax({
                    async: false, // Puesta a false para que no pueda realizar otra llamada hasta que esta se complete
                    type: 'post',
                    datatype: JSON,
                    url: '/losmayses/public/admin/pedidos/cambio_estado',
                    data: {
                        objDatosPedido: $objDatosPedido
                    },
                    success: function(data) {
                        if(data.status == 'success'){
                                $('#modalEstado').modal('toggle');
                            location.reload();

                        }else if(data.status == 'error'){
                            alert("Error en la conexion, intentelo de nuevo.");
                        }
                        //$('#tablaPedidoActual tbody>tr').remove();
                        //$('option:selected', this).attr('selected', false);

                    }
                }); // FIN FUNCION AJAX
            });


        });
    </script>


@stop