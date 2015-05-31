@extends('layout_admin')
@section('titulo') Administracion - Ver pedido @stop


@section('content')

<div class="container">


    @if($datosPedido[0]['estado'] == 4 || $datosPedido[0]['estado'] == 5)
        ALBARAN Y FACTURA
        {{ HTML::link('/admin/pedidos/albaran/'.$datosPedido[0]['id'], 'ALBARAN') }}
        {{ HTML::link('/admin/pedidos/factura/'.$datosPedido[0]['id'], 'FACTURA') }}

    @elseif($datosPedido[0]['estado'] == 3)
        ALBARAN
        {{ HTML::link('/admin/pedidos/albaran', 'ALBARAN') }}


    @endif





    <div class="container col-md-6">
        <h3>DATOS DE CLIENTE</h3>
        <h4>Nombre contacto: </h4><p>{{ $datosPedido[0]['usuario']['nombre_contacto'] }}</p>
        <h4>Nombre empresa: </h4><p>{{ $datosPedido[0]['usuario']['nombre_empresa'] }}</p>
        <h4>Email: </h4><p>{{ $datosPedido[0]['usuario']['correo'] }}</p>
        <h4>Telefono 1: </h4><p>{{ $datosPedido[0]['usuario']['telefono1'] }}</p>
        @if($datosPedido[0]['usuario']['telefono2'])
            <h4>Telefono 2: </h4><p>{{ $datosPedido[0]['usuario']['telefono2'] }}</p>
        @endif
    </div>

    <div class="container col-md-6">
        <div class="container">
            <h3>DATOS DE TIENDA</h3>
            <h4>Nombre tienda: </h4><p>{{ $datosTienda[0]['nombre'] }}</p>
            <h4>Direccion: </h4><p>{{ $datosTienda[0]['direccion'] }}</p>
            <h4>CIF: </h4><p>{{ $datosTienda[0]['cif'] }}</p>
            <h4>Email: </h4><p>{{ $datosTienda[0]['correo'] }}</p>
            <h4>Telefono 1: </h4><p>{{ $datosTienda[0]['telefono_1'] }}</p>
            @if($datosTienda[0]['telefono_2'])
                <h4>Telefono 2: </h4><p>{{ $datosTienda[0]['telefono_2'] }}</p>
            @endif
            <h4>Provincia: </h4><p>{{ $datosTienda[0]['provincia'] }}</p>
            <h4>Localidad: </h4><p>{{ $datosTienda[0]['localidad'] }}</p>
            <h4>Código postal: </h4><p>{{ $datosTienda[0]['cod_postal'] }}</p>
        </div>
    </div>


    <hr/>

    <div class="container">

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
                    @foreach($productos as $k)
                        @if ($pro->producto_id == $k['id'])
                            <td>{{ $k['nombre'] }}</td>
                            @break
                        @endif
                    @endforeach
                    <td>{{ $pro->cantidad }}</td>
                    <td id="pvptabla">{{ $pro->precioUnidad }}</td>
                    <td>{{ $pro->iva }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div> <!-- CONTAINER TABLA LISTADO-->

    <div class="container">
        <label for="sinIVA">Precio SIN IVA: </label>
        <input disabled type="text" size="" maxlength="" value="0" name="cantidad_sinIVA" id="sinIVA">
        <br/>
        <label for="conIVA">PRECIO CON IVA</label>
        <input disabled type="text" size="" maxlength="" value="0" name="cantidad_conIVA" id="conIVA">
    </div>


</div>



<script>
    $(document).ready(function() {
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