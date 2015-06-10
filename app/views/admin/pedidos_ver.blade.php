@extends('layout_admin')
@section('titulo') Administracion - Ver pedido @stop


@section('content')


    <div class="row">

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Pedidos > Ver pedido</h1>
            </div>
        </div>

    </div>

    {{-- dd($datosPedido[0]) --}}

    <div class="row">
        <div class="col-md-12">
            <span id="idDelPedido" style="display: none;">{{ $datosPedido[0]['id'] }}</span>


            @if($datosPedido[0]['estado'] == 3)

                @if($datosPedido[0]['num_factura'] != 0 && $datosPedido[0]['num_albaran'] != 0)
                    {{-- SI HAY ALBARAN Y HAY FACTURA --}}

                    {{ HTML::link('/admin/pedidos/albaran/'.$datosPedido[0]['id'], 'VER ALBARAN', array('class' => 'btn btn-primary btn-info btn-block')) }}
                    {{ HTML::link('/admin/pedidos/factura/'.$datosPedido[0]['id'], 'VER FACTURA', array('class' => 'btn btn-primary btn-danger btn-block')) }}

                @elseif ($datosPedido[0]['num_albaran'] != 0 && $datosPedido[0]['num_factura'] == 0)
                    {{-- SI HAY ALBARAN PERO NO FACTURA --}}

                    {{ HTML::link('/admin/pedidos/albaran/'.$datosPedido[0]['id'], 'ALBARAN', array('class' => 'btn btn-primary btn-info btn-block')) }}

                    <button id="genNumFactura" type="button" class="btn btn-primary btn-warning btn-block">GENERAR NUMERO FACTURA</button>

                @elseif ($datosPedido[0]['num_factura'] == 0 && $datosPedido[0]['num_albaran'] == 0)
                    {{-- SI NO HAY ALBARAN Y NO HAY FACTURA --}}
                    <button id="genNumAlbaran" type="button" class="btn btn-primary btn-warning btn-block">GENERAR NUMERO ALBARAN</button>

                @endif


            @elseif($datosPedido[0]['estado'] == 2)

                @if($datosPedido[0]['num_albaran'] == 0)
                    <button id="genNumAlbaran" type="button" class="btn btn-primary btn-warning btn-block">GENERAR NUMERO ALBARAN</button>
                @else
                    {{ HTML::link('/admin/pedidos/albaran/'.$datosPedido[0]['id'], 'ALBARAN', array('class' => 'btn btn-primary btn-info btn-block')) }}
                @endif

            @endif
        </div>

    </div>

    <hr/>



    <div class="row">

            <div class="col-md-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos de la tienda</h3>
                    </div>
                    <div class="panel-body">

                        <p><strong>Nombre tienda: </strong>{{ $datosTienda[0]['nombre'] }}</p>
                        <p><strong>Direccion: </strong>{{ $datosTienda[0]['direccion'] }}</p>
                        <p><strong>CIF: </strong>{{ $datosTienda[0]['cif'] }}</p>
                        <p><strong>Email: </strong>{{ $datosTienda[0]['correo'] }}</p>
                        <p><strong>Telefono 1: </strong>{{ $datosTienda[0]['telefono_1'] }}</p>
                        @if($datosTienda[0]['telefono_2'])
                            <p><strong>Telefono 2: </strong>{{ $datosTienda[0]['telefono_2'] }}</p>
                        @endif
                        <p><strong>Provincia: </strong>{{ $datosTienda[0]['provincia'] }}</p>
                        <p><strong>Localidad: </strong>{{ $datosTienda[0]['localidad'] }}</p>
                        <p><strong>Código postal: </strong>{{ $datosTienda[0]['cod_postal'] }}</p>
                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos del cliente</h3>
                    </div>
                    <div class="panel-body">
                        <p><strong>Nombre contacto: </strong>{{ $datosPedido[0]['usuario']['nombre_contacto'] }}</p>
                        <p><strong>Nombre empresa: </strong>{{ $datosPedido[0]['usuario']['nombre_empresa'] }}</p>
                        <p><strong>Email: </strong>{{ $datosPedido[0]['usuario']['correo'] }}</p>
                        <p><strong>Telefono 1: </strong>{{ $datosPedido[0]['usuario']['telefono1'] }}</p>
                        @if($datosPedido[0]['usuario']['telefono2'])
                            <p><strong>Telefono 2: </strong>{{ $datosPedido[0]['usuario']['telefono2'] }}</p>
                        @endif
                    </div>
                </div>

            </div>

    </div>


    <div class="row">


        <div class="col-md-12">

            <div class="table-responsive">

                <table id="tablaPedido" class="table table-striped table-bordered">
                    <thead>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio por Unidad</th>
                    <th>IVA</th>
                    </thead>
                    <tbody>
                    @foreach($productosPedido as $pro)

                        <tr>
                            <td>{{ $pro->nombre_producto }}</td>
                            <td>{{ $pro->cantidad }}</td>
                            <td id="pvptabla">

                                @if($datosPedido[0]['signo_tarifa'] == "-")
                                    {{ 1*$pro->precioUnidad - ($datosPedido[0]['valor_tarifa'] * (1*$pro->precioUnidad / 100)) }}
                                @else
                                    {{ 1*$pro->precioUnidad + ($datosPedido[0]['valor_tarifa'] * (1*$pro->precioUnidad / 100)) }}
                                @endif


                            </td>
                            <td>{{ $pro->iva }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>

            </div>


        </div>


    </div> <!-- FIN DEL ROW -->


    <div class="row">

        <div class="col-md-12">

            <div class="pull-right">
                <label for="sinIVA">Precio SIN IVA: </label>
                <input disabled type="text" size="15" maxlength="" style="text-align: right" value="0" name="cantidad_sinIVA" id="sinIVA"> €
            </div>

            <br/><br/>

            <div class="pull-right">
                <label for="conIVA">PRECIO CON IVA:</label>
                <input disabled type="text" size="15" maxlength="" style="text-align: right" value="0" name="cantidad_conIVA" id="conIVA"> €
            </div>


        </div>

    </div>

    <br/>






<script>
    $(document).ready(function() {


        $(document).on('click', '#genNumAlbaran', function() {
            $objDatos = [];

            dat = {};
            dat['accion'] = 'generar_albaran';
            dat['idPedido'] = $('#idDelPedido').text();

            $objDatos.push(dat);

            $.ajax({
                async: false, // Puesta a false para que no pueda realizar otra llamada hasta que esta se complete
                type: 'post',
                datatype: JSON,
                url: '/losmayses/public/admin/pedidos/gen_num_albaran',
                data: {
                    objDatos: $objDatos
                },
                success: function(data) {
                    if(data.status == 'success'){
                        location.reload();

                    }else if(data.status == 'error'){
                        alert("Error en la conexion, intentelo de nuevo.");
                    }
                    //$('#tablaPedidoActual tbody>tr').remove();
                    //$('option:selected', this).attr('selected', false);
                }
            }); // FIN FUNCION AJAX
        }); // FIN FUNCION ON CLICK GENERAR ALBARAN





        $(document).on('click', '#genNumFactura', function() {

            $objDatos = [];

            dat = {};
            dat['accion'] = 'generar_factura';
            dat['idPedido'] = $('#idDelPedido').text();

            $objDatos.push(dat);

            $.ajax({
                async: false, // Puesta a false para que no pueda realizar otra llamada hasta que esta se complete
                type: 'post',
                datatype: JSON,
                url: '/losmayses/public/admin/pedidos/gen_num_factura',
                data: {
                    objDatos: $objDatos
                },
                success: function(data) {
                    if(data.status == 'success'){
                        location.reload();

                    }else if(data.status == 'error'){
                        alert("Error en la conexion, intentelo de nuevo.");
                    }
                    //$('#tablaPedidoActual tbody>tr').remove();
                    //$('option:selected', this).attr('selected', false);

                }
            }); // FIN FUNCION AJAX

        }); // FIN FUNCION ON CLICK GENERAR ALBARAN


        sumaTotales();

    // FUNCION PARA CALCULAR EL PRECIO FINAL CON Y SIN IVA, Y ACTUALIZARLO
    function sumaTotales() {
        var coniva = 0;
        var siniva = 0;
        var cProducto = 0;
        var ivaproducto = 0;
        var pProducto = 0;
        var mem = 0;

        $("#tablaPedido td#pvptabla").each(function(){
            cProducto = parseFloat($(this).prev().text()); // CANTIDAD DEL PRODUCTO
            pProducto = parseFloat($(this).text()); // PRECIO DEL PRODUCTO
            ivaproducto = parseInt($(this).next().text()); // IVA DEL PRODUCTO

            /* CALCULO DE PRECIO TOTAL CON Y SIN IVA */
            siniva += cProducto*pProducto;
            mem = cProducto*pProducto;
            coniva += parseFloat(mem + (ivaproducto*(mem/100)));
        });

        $('#sinIVA').val(siniva.toFixed(2));
        $('#conIVA').val(coniva.toFixed(2));
    };


    });

</script>


@stop