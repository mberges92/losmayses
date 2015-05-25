@extends('layout_admin')
@section('titulo') Administracion - Editar producto @stop


@section('content')

    <div class="container">
        <div class="col-sm-12 col-md-6">

            <b>FORMULARIO MODIFICAR PRODUCTO</b>
            {{ Form::open(array(
                'url' => '/admin/productos/editar/'.$producto['id'],
                'method' => 'post',
                'action' => 'ProductosController@modificar',
                'id' => 'editarProductoForm')) }}

            {{ Form::submit('Enviar') }}
            <br/>

            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $producto['nombre'], array('class' => 'form-control')) }}

            {{ Form::label('iva', 'IVA') }}
            {{ Form::text('iva', $producto['iva'], array('class' => 'form-control')) }}

            {{ Form::label('precio_total', 'Precio Unidad/Pack') }}
            {{ Form::text('precio_total', $producto['precio_total'], array('class' => 'form-control')) }}

            <br/>


<div class="container">


                                        @foreach($allcategorias as $kcategoria)
                                            <div class="checkbox">
                                                @define $yyy = false

                                                @foreach($producto['categorias'] as $ca)
                                                    @if($kcategoria['id'] == $ca['id'])
                                                        @define $yyy = true
                                                        @break
                                                    @endif
                                                @endforeach

                                                @if($yyy)
                                                    {{  Form::checkbox('kcategoria[]', $kcategoria['id'], true, array('id' => 'CategoriaCategoria'.$kcategoria['id'])) }}
                                                @else
                                                    {{ Form::checkbox('kcategoria[]', $kcategoria['id'], false, array('id' => 'CategoriaCategoria'.$kcategoria['id'])) }}
                                                @endif

                                                {{ Form::label('CategoriaCategoria'.$kcategoria['id'], $kcategoria['nombre'], array('class' => '')) }}
                                            </div>
                                        @endforeach

</div>

            {{ Form::close() }}

        </div>
    </div>


    <script>

        $('#editarProductoForm').validate({
            rules: {
                nombre: {
                    required: true,
                    maxlength: 255,
                    remote: "http://"+location.host+"/losmayses/public/validation/comprobar_producto/{{$producto['id']}}"
                },
                iva: {
                    required: true,
                    digits: true,
                    maxlength: 11
                },
                precio_total: {
                    required: true,
                    number: true
                    //maxlength: 255
                }
            } // FIN DE RULES

        });

    </script>



@stop