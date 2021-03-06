@extends('layout_cliente')
@section('titulo') Cliente - Pedidos @stop


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Pedidos > Nuevo pedido</h1>
        </div>
        @if ($datosUsuario[0]['tarifa_id'] == 0)
            <p><strong>Contacte con LosMayses para su activacion de pedidos</strong></p>
        @endif
        <div>
            @foreach($datosUsuario as $usu)
                <p id="signoTarifa" style="display: none;">{{ $usu['tarifa']['signo'] }}</p>
                <p id="valorTarifa" style="display: none;">{{ $usu['tarifa']['valor'] }}</p>
            @endforeach
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">


            <div class="form-group">
                <p>Fecha entrega: <input disabled type="text" id="datepicker"></p>

            </div>

            <div class="form-group">
                <select id="tiendasSelect" class="form-control">
                    <option selected disabled value="0">SELECCIONA TIENDA PEDIDO</option>
                    @if ($datosUsuario[0]['tarifa_id'] != 0)
                        @foreach($datosUsuario[0]['tiendas'] as $tienda)
                            @if($tienda['completo'] == 1)
                                <option value="{{ $tienda['id'] }}">{{ $tienda['nombre'] }}</option>
                            @endif
                        @endforeach

                    @endif
                </select>
            </div>


            <div class="form-group">
                <select disabled id="categoriasSelect" class="form-control">
                    <!-- <option selected disabled>SELECCIONA CATEGORIA</option> -->
                    <option selected disabled value="0">SELECCIONA CATEGORIA</option>
                    @foreach($categoriasActivas as $cat)
                        <option value="{{ $cat['id'] }}">{{ $cat['nombre'] }}</option>
                    @endforeach
                </select>
            </div>



            <div class="col-md-6">
                <div class="form-group">
                    <select id="productosSelect" class="form-control" size="12" style="max-width: 100%;">
                        <option disabled value="0">DEFAULT</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                        <div class="form-group">
                        <label for="precioUnidad">Precio producto: </label>
                        <input type="text" class="form-control" disabled size="" maxlength="" value="" name="precio_unidad" id="precioUnidad">
                        </div>

                        <div class="form-group">
                        <label for="ivaUnidad">Iva producto: </label>
                        <input type="text" class="form-control" disabled size="" maxlength="" value="" name="iva_unidad" id="ivaUnidad">
                        </div>

                        <div class="form-group">
                        <label for="cantidadUnidad">Cantidad a comprar: </label>
                        <input type="text" class="form-control" size="" maxlength="" value="1" name="cantidad_unidad" id="cantidadUnidad">
                        </div>
                </div>
            </div>

            <button type="button" id="addTabla" class="btn btn-success btn-block">Añadir producto</button>
            <br/>
            <hr/>
            <br/>

        </div> <!-- FIN DEL PRIMER ROW DE 6-->



    </div>



    <div class="row">

        <div class="col-md-12">


            <div class="panel panel-primary">

                <div class="panel-body">

                    <div class="table-responsive">

                        <table class="table table-hover" id="tablaPedidoActual">
                            <thead>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio por unidad</th>
                            <th>IVA</th>
                            <th>Accion</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div> <!-- FIN DEL ROW TABLA DE PEDIDO-->


    <div class="row">

        <div class="col-md-12">


            <div class="pull-right">
            <label for="sinIVA">Precio SIN IVA: </label>
            <input disabled class="form-control" type="text" size="" maxlength="" value="0" name="cantidad_sinIVA" id="sinIVA">
            </div>
            <br/><br/><br/>
            <div class="pull-right">
            <label for="conIVA">PRECIO CON IVA</label>
            <input disabled class="form-control" type="text" size="" maxlength="" value="0" name="cantidad_conIVA" id="conIVA">
            </div>
            <br/><br/>      <br/><br/>
            <button id="hacerPedido" class="btn btn-block btn-warning">Realizar pedido</button>

        </div>

    </div>





    <script>
        $(document).ready(function() {
            $( "#datepicker" ).datepicker({
                    minDate: +1,
                    showOn: "button",
                    buttonImage: "/losmayses/public/css/images/calendar.gif",
                    buttonImageOnly: true,
                    buttonText: "Selecciona fecha",
                    dateFormat: "dd-mm-yy"
            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // Solo se pueden introducir numeros enteros
            $('#cantidadUnidad').keydown(function(event) {
                // Allow special chars + arrows
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9
                        || event.keyCode == 27 || event.keyCode == 13
                        || (event.keyCode == 65 && event.ctrlKey === true)
                        || (event.keyCode >= 35 && event.keyCode <= 39)){
                    return;
                }else {
                    // Si no es un numero, parar el keypress
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault();
                    }
                }
            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // PRODUCTO DE LAS CATEGORIAS
            $('#categoriasSelect').change(function(){
                //$('option:selected', this).attr('selected', false);
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

                var elsignoTarifa = $('#signoTarifa').text();
                var elvalorTarifa = $('#valorTarifa').text();

                //alert(elvalorTarifa);

                $('#precioUnidad').val("");
                $.getJSON('/losmayses/public/buscar_producto/'+$(this).val(), function(data) {
                    //alert(data[0]['id']);

                    var mem2 = 1*data[0]['precio_total'];

                    if (elsignoTarifa == "-") {
                        $('#precioUnidad').val(parseFloat(mem2 - (elvalorTarifa * (mem2 / 100))).toFixed(2));

                    } else {
                        $('#precioUnidad').val(parseFloat(mem2 + (elvalorTarifa * (mem2 / 100))).toFixed(2));

                    }

                    $('#ivaUnidad').val(data[0]['iva']);

                });


            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // AÑADIR ROWS A LA TABLA CON LOS DATOS DEL PRODUCTO AL PULSAR EL BOTON AÑADIR
            $('#addTabla').click(function() {

                signotarifa = $('#signoTarifa').text();
                valortarifa = $('#valorTarifa').text();
                productoselect = $("#productosSelect option:selected" ).text();
                id_del_producto = $("#productosSelect option:selected" ).val();
                cantidadproducto = $('#cantidadUnidad').val();
                ivaproducto = $('#ivaUnidad').val();
                precioproducto = $('#precioUnidad').val();


                cantidadproducto = cantidadproducto.replace(/^0+/, '');

                if (productoselect == '' || cantidadproducto == '' || ivaproducto == '' || parseInt(cantidadproducto) <= 0) {
                    alert('Seleccione un producto para añadir al pedido.');
                } else {

                    $('#tablaPedidoActual').append('<tr><td id="'+id_del_producto+'">'+productoselect+'</td><td id="cantidadtabla">'+cantidadproducto+'</td><td id="pvptabla">'+precioproducto+'</td><td id="ivatabla">'+ivaproducto+'</td><td><button type="button" id="deletefila" class="btn btn-danger">Eliminar</button></td></tr>');
                    sumaTotales();
                }
            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // ELIMINAR FILA CORRESPONDIENTE EN LA TABLA PEDIDOS QUE PULSE EL BOTON ELIMINAR
            $(document).on("click", "button#deletefila", function(event) {
                $(this).closest('tr').remove();
                sumaTotales();

                return false;
            });
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // FUNCION PARA CALCULAR EL PRECIO FINAL CON Y SIN IVA, Y ACTUALIZARLO
            function sumaTotales() {
                var coniva = 0;
                var siniva = 0;
                var cProducto = 0;
                var ivaproducto = 0;
                var pProducto = 0;
                var mem = 0;

                $("#tablaPedidoActual td#pvptabla").each(function(){
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
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // ENVIAR PEDIDO POR AJAX
            $('#hacerPedido').click(function() {

                var numeroRows = $('#tablaPedidoActual tbody>tr').length;

                //if (numeroRows == 0 || $('#datepicker').is(':empty')) {
                if (numeroRows == 0) {
                    alert('Seleccione al menos un producto para añadir al pedido o fecha para la entrega.');
                } else {

                    $objDatosColumna = [];

                    var $objCuerpoTabla = $('#tablaPedidoActual').children().prev().parent();
                    $objCuerpoTabla.find('tbody tr').each(function(){

                        var idarticulo = $(this).find('td').eq(0).attr('id');
                        var articulo2 = $(this).find('td').eq(0).html();
                        var cantidad2 = $(this).find('td').eq(1).html();
                        var precio2 = $(this).find('td').eq(2).html();
                        var iva2 = $(this).find('td').eq(3).html();
                        var nombre_articulo2 = $(this).find('td').eq(0).html();


                        valor = {};
                        valor['idarticulo'] = idarticulo;
                        valor["articulo"] = articulo2;
                        valor["cantidad"] = cantidad2;
                        valor["precio"] = precio2;
                        valor["iva"] = iva2;
                        valor["nombre_articulo"] = nombre_articulo2;

                        $objDatosColumna.push(valor);

                    }); // FIN DEL FOREACH

                    $objDatosCliente = [];
                    var idtienda = $("#tiendasSelect").val();
                    var fechaEntrega = $("#datepicker").val();
                    var signoTarifaActual = $('#signoTarifa').text();
                    var valorTarifaActual = $('#valorTarifa').text();

                    console.log(fechaEntrega);

                    dat = {};
                    dat['idtienda'] = idtienda;
                    dat['fechaEntrega'] = fechaEntrega;
                    dat['signoTarifa'] = signoTarifaActual;
                    dat['valorTarifa'] = valorTarifaActual;

                    $objDatosCliente.push(dat);


                    $.ajax({
                        async: false, // Puesta a false para que no pueda realizar otra llamada hasta que esta se complete
                        type: 'post',
                        datatype: JSON,
                        url: '/losmayses/public/cliente/nuevoPedido',
                        data: {
                            objDatosColumna: $objDatosColumna,
                            objDatosCliente: $objDatosCliente
                        },
                        success: function(data) {
                            if(data.status == 'success'){
                                alert("Pedido enviado y guardado correctamente.");
                            }else if(data.status == 'error'){
                                alert("Error en el pedido, intentelo de nuevo.");
                            }
                            $('#tablaPedidoActual tbody>tr').remove();
                            $('option:selected', this).attr('selected', false);

                        }
                    }); // FIN FUNCION AJAX
                } // FIN DE IF ELSE
            }); // FIN FUNCION CLICK
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            //////////////////////////////////////////////////////////////////////////////////////////// -----
            // COMPORTAMIENTO
            $('#tiendasSelect').change(function() { // Cuando cambiemos a una opcion, activara las categorias
                $('#categoriasSelect').prop('disabled', false);
            });
        }); // FIN DE DOCUMENT READY
    </script>


@stop