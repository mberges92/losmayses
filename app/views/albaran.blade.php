<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Albaran - LosMayses</title>

    {{HTML::script('js/jquery-1.11.2.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

    {{HTML::style('css/bootstrap.min.css')}}
    <style>
        @media all {
            div.saltopagina{
                display: none;
            }
        }

        @media print{
            div.saltopagina{
                display:block;
                page-break-before:always;
            }
            /*
            */
        }
    </style>
</head>
<body>


<div class="container">

    <div class="row">

        <div class="container col-xs-6">
            <h1>{{ HTML::image('imagenes_mini', 'los mayses', array('class' => 'img img-responsive', 'height' => '250px', 'width' => '270px')) }}</h1>
        </div>
        <div class="col-xs-6 text-right">
            <h1>ALBARÁN</h1>
            <h1><small>Albaran #001</small></h1>
        </div>

        <hr/>

        <div class="row">
            <div class="col-xs-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>De: LosMayses</h4>
                    </div>
                    <div class="panel-body">
                        Fecha de expedicion: {{ date("d-m-Y", strtotime($datosPedido[0]['fechaEntrega'])) }} <br/>
                        NIF: A58818501 <br/>
                        Dirección: C/ Miguel Servet, 5, Zaragoza, 50002 <br/>
                        Telefono: 976 425 259 <br/>
                        Email: <span>info@pasteleriamayses.com</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-5 col-xs-offset-2 text-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Para: {{ $datosPedido[0]['usuario']['nombre_empresa'] }}</h4>
                    </div>
                    <div class="panel-body text-left">
                        Tienda: {{ $datosTienda[0]['nombre'] }} <br/>
                        Dirección: {{ $datosTienda[0]['direccion'] }}, {{ $datosTienda[0]['provincia'] }}, {{ $datosTienda[0]['localidad'] }}, {{ $datosTienda[0]['cod_postal'] }} <br/>
                        CIF: {{ $datosTienda[0]['cif'] }} <br/>
                        Telefono: {{ $datosTienda[0]['telefono_1'] }} <br/>
                        @if($datosTienda[0]['telefono_2'])
                            Telefono 2: {{ $datosTienda[0]['telefono_2'] }} <br/>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <table id="tablaPedido" class="table table-bordered">
            <thead>
            <tr>
                <th>
                    <h4>Articulo</h4>
                </th>
                <th>
                    <h4>Cantidad</h4>
                </th>
                <th>
                    <h4>Precio/Unidad</h4>
                </th>
                <th>
                    <h4>IVA</h4>
                </th>
            </tr>
            </thead>
            <tbody>

            <?php $i=0 ?>

            @foreach($productosPedido as $pro)
                <?php $i++ ?>
                <tr>
                    @foreach($productos as $k)
                        @if ($pro->producto_id == $k['id'])
                            <td>{{ $k['nombre'] }}</td>
                            @break
                        @endif
                    @endforeach
                    <td>{{ $pro->cantidad }}</td>
                    <td id="pvptabla">
                        @if($tar['signo'] == "-")
                            {{ 1*$pro->precioUnidad - ($tar['valor'] * (1*$pro->precioUnidad / 100)) }}
                        @else
                            {{ 1*$pro->precioUnidad + ($tar['valor'] * (1*$pro->precioUnidad / 100)) }}
                        @endif
                    </td>
                    <td>{{ $pro->iva }}</td>
                </tr>

                <?php
                $g = count($productosPedido);
                if ($i%$g==0) {

                } elseif ($i == 10 || $i%10==0) {

                echo "</tbody></table>";
                echo "<div class='saltopagina'></div>"; ?>


                <div class="col-xs-6">
                    <h1>{{ HTML::image('imagenes/pasteleria-mayses-logo.jpg', 'los mayses', array('class' => 'img img-responsive', 'height' => '250px', 'width' => '270px')) }}</h1>
                </div>
                <div class="col-xs-6 text-right">
                    <h1>FACTURA</h1>
                    <h1><small>Factura #001</small></h1>
                </div>

                <hr />

                <div class="row">
                    <div class="col-xs-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>De: LosMayses</h4>
                            </div>
                            <div class="panel-body">
                                Fecha de expedicion: {{ $datosPedido[0]['fechaEntrega'] }} <br/>
                                NIF: A58818501 <br/>
                                Dirección: C/ Miguel Servet, 5, Zaragoza, 50002 <br/>
                                Telefono: 976 425 259 <br/>
                                Email: <span>info@pasteleriamayses.com</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-5 col-xs-offset-2 text-right">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Para: {{ $datosPedido[0]['usuario']['nombre_empresa'] }}</h4>
                            </div>
                            <div class="panel-body text-left">
                                Tienda: {{ $datosTienda[0]['nombre'] }} <br/>
                                Dirección: {{ $datosTienda[0]['direccion'] }}, {{ $datosTienda[0]['provincia'] }}, {{ $datosTienda[0]['localidad'] }}, {{ $datosTienda[0]['cod_postal'] }} <br/>
                                CIF: {{ $datosTienda[0]['cif'] }} <br/>
                                Telefono: {{ $datosTienda[0]['telefono_1'] }} <br/>
                                @if($datosTienda[0]['telefono_2'])
                                    Telefono 2: {{ $datosTienda[0]['telefono_2'] }} <br/>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>



                <table id="tablaPedido" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <h4>Articulo</h4>
                        </th>
                        <th>
                            <h4>Cantidad</h4>
                        </th>
                        <th>
                            <h4>Precio/Unidad</h4>
                        </th>
                        <th>
                            <h4>IVA</h4>
                        </th>
                    </tr>
                    </thead>
                    <tbody>



                    <?php } ?>
                    @endforeach


                    </tbody>
                </table>

                <div class="row text-right">
                    <div class="col-xs-3 col-xs-offset-6"><strong>
                            Sub Total: <br/>
                            Impuestos: <br/>
                            Total:
                        </strong></div>
                    <div class="col-xs-2"><strong>
                            <input disabled type="text" size="" maxlength="" value="0" name="cantidad_sinIVA" id="sinIVA">
                            <br/>
                            <input disabled type="text" size="" maxlength="" value="0" name="catidad_deIVA" id="desgloseIVA">
                            <br/>
                            <input disabled type="text" size="" maxlength="" value="0" name="cantidad_conIVA" id="conIVA">

                        </strong>
                    </div>
                </div>


        </table>
    </div> <!-- /row -->

</div> <!-- /container -->

<script>
    $(document).ready(function() {

        sumaTotales();

        function sumaTotales() {
            var coniva = 0;
            var siniva = 0;
            var cProducto = 0;
            var ivaproducto = 0;
            var pProducto = 0;
            var mem = 0;
            var soloiva = 0;


            $("#tablaPedido td#pvptabla").each(function(){
                cProducto = parseFloat($(this).prev().text()); // CANTIDAD DEL PRODUCTO
                pProducto = parseFloat($(this).text()); // PRECIO DEL PRODUCTO
                ivaproducto = parseInt($(this).next().text()); // IVA DEL PRODUCTO

                /* CALCULO DE PRECIO TOTAL CON Y SIN IVA */
                siniva += cProducto*pProducto;
                mem = cProducto*pProducto;
                soloiva += parseFloat(ivaproducto*(mem/100));
                coniva += parseFloat(mem + (ivaproducto*(mem/100)));
            });

            $('#sinIVA').val(siniva.toFixed(2));
            $('#desgloseIVA').val(soloiva.toFixed(2));
            $('#conIVA').val(coniva.toFixed(2));
        };


    });
</script>


</body>
</html>
