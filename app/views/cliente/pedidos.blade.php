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
                <option>SELECCIONA CATEGORIA</option>
                @foreach($categoriasActivas as $cat)
                    <option value="{{ $cat['id'] }}">{{ $cat['nombre'] }}</option>
                @endforeach
            </select>
        </div>

    <hr/>

        <div>

            <select id="productos_select" multiple size="10" style="width: 200px;">
                <option value="">qsddddddddd</option>
            </select>
        </div>

    <hr/>

        <div>
            INPUTS DE CANTIDAD, PRECIO, IVA, AÑADIR
        </div>

    <hr/>

        <div>

        </div>


</div>

<hr/>

<div class="container">
    TABLA CON LOS PRODUCTOS COMPRADOS ACTUALMENTE
</div>


    <script>
        $(document).ready(function() {


            $('#categoriasSelect').change(function() {
                /* COGER EL TEXTO DEL OPTION SELECCIONADO
                 var mitexto = $("#miselect option:selected").text()
                 */
                var idcategoria = $(this).val(); // Obtengo el value del option seleccionado


            });



            }); // FIN DE DOCUMENT READY


    </script>





@stop