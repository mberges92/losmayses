@extends('layout_cliente')
@section('titulo') Cliente - Pedidos @stop


@section('content')

<div class="container">
    TABLAS CON LOS PEDIDOS DEL CLIENTE
</div>

<hr/>

<div class="container">
    CATEGORIAS CON PRODUCTOS


        <div>
            <select id="categoriasSelect">
                <!-- <option selected disabled>SELECCIONA CATEGORIA</option> -->
                <option selected disabled>SELECCIONA CATEGORIA</option>
                @foreach($categoriasActivas as $cat)
                    <option value="{{ $cat['id'] }}">{{ $cat['nombre'] }}</option>
                @endforeach
            </select>
        </div>

    <hr/>

        <div>
            <select id="productosSelect" size="10" style="width: 200px;">
                <option disabled value="0">DEFAULT</option>
            </select>
        </div>

    <hr/>
    <label for="precioUnidad">Precio producto: </label>
    <input type="text" disabled size="" maxlength="" value="" name="precio_unidad" id="precioUnidad">
    <br/>
    <label for="ivaUnidad">Iva producto: </label>
    <input type="text"  disabled size="" maxlength="" value="" name="iva_unidad" id="ivaUnidad">
    <br/>
    <label for="cantidadUnidad">Cantidad a comprar: </label>
    <input type="text" size="" maxlength="" value="1" name="cantidad_unidad" id="cantidadUnidad">

    <button type="button" id="addTabla">Añadir</button>
    <hr/>

    <div class="container">
        <table class="table" id="tablaPedidoActual">
            <legend>PEDIDO ACTUAL</legend>
            <thead>
            <th>Articulo</th>
            <th>Cantidad</th>
            <th>Precio de compra</th>
            <th>IVA</th>
            <th>Accion</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>

        </table>
    </div>


</div>

<hr/>

<div class="container">
    TABLA CON LOS PRODUCTOS COMPRADOS ACTUALMENTE
</div>


    <script>
        $(document).ready(function() {

            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // PRODUCTO DE LAS CATEGORIAS

            /*var mitexto = $("#miselect option:selected").text()/*
            /*var idcategoria = $(this).val(); // Obtengo el value del option seleccionado*/
            $('#categoriasSelect').change(function(){

                $.getJSON('/losmayses/public/pedir_productos/'+$(this).val(), function(data) {
                    $('#productosSelect').empty();   //Esto vacia el select multiple de productos
                        $.each(data, function() {
                            $('#productosSelect').append(new Option(this.nombre, this.id));
                        });
                    });
                });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // PRECIO DEL PRODUCTO, IVA TIPO DE PRODUCTO
            $('#productosSelect').change(function(){
                $('#precioUnidad').val("");
                $.getJSON('/losmayses/public/buscar_producto/'+$(this).val(), function(data) {
                    //alert(data[0]['id']);
                    $('#precioUnidad').val(data[0]['precio_total']);
                    $('#ivaUnidad').val(data[0]['iva']);

                });
            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // AÑADIR ROWS A LA TABLA CON LOS DATOS DEL PRODUCTO AL PULSAR EL BOTON AÑADIR
            $('#addTabla').click(function() {
                $('#')
                $('#tablaPedidoActual').append('<tr><td>column 1 value</td><td>column 2 value</td></tr>');
            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----



            }); // FIN DE DOCUMENT READY

        /*
        for(var i=0;i<data.length; i++)
        {
            options += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";
        }

        select.append(options);
        */


    </script>





@stop