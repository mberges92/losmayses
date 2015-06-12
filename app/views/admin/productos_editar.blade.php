@extends('layout_admin')
@section('titulo') Administracion - Editar producto @stop


@section('content')


    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Productos > Modificar producto</h1>
        </div>
    </div>



    <div class="row">


        <div class="col-md-12 col-lg-6">
            {{ Form::open(array(
                'url' => '/admin/productos/editar/'.$producto['id'],
                'method' => 'post',
                'action' => 'ProductosController@modificar',
                'id' => 'editarProductoForm')) }}

            <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $producto['nombre'], array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('iva', 'IVA') }}
            {{ Form::text('iva', $producto['iva'], array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
            {{ Form::label('precio_total', 'Precio Unidad/Pack') }}
            {{ Form::text('precio_total', $producto['precio_total'], array('class' => 'form-control')) }}
            </div>

        </div>



        <div class="col-md-12 col-lg-6">
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
        </div>
    </div>


    <div class="row">

        <div class="col-md-12 col-lg-6">
            {{ Form::submit('Enviar', array('class' => 'btn btn-primary btn-success btn-block btn-lg')) }}
            {{ Form::close() }}
        </div>

    </div>


    <script>
$(document).ready(function() {


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

});



    </script>



@stop