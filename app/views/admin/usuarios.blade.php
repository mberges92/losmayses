@extends('layout_admin')
@section('titulo') Administracion - Usuarios @stop


@section('content')


<div class="container">
    <table class="table">
        <legend>LISTADO</legend>
        <thead>
        <th>Activo</th>
        <th>Nombre de cliente</th>
        <th>Correo</th>
        <th>Empresa</th>
        <th>Tarifa</th>
        <th>Accion</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>
                @if ($usuario->activo == 1)
                    <a class="ajax_bool btn btn-sm btn-success-alt" href="/losmayses/public/admin/usuarios/boolean_ajax/{{ $usuario->id }}/1/activo">
                        <span class="estado_activo">Activo</span></a>
                @else
                    <a class="ajax_bool btn btn-sm btn-danger-alt" href="/losmayses/public/admin/usuarios/boolean_ajax/{{ $usuario->id }}/0/activo">
                        <span class="estado_inactivo">Inactivo</span></a>
                @endif

            </td>
            <td>{{ $usuario->nombre_contacto }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->nombre_empresa }}</td>
            @if($usuario->tarifa_id == 0)
                <td id="sinTarifa">SIN TARIFA</td>
            @else
                @foreach($tarifas as $tarifa)
                    @if($usuario->tarifa_id == $tarifa->id)
                        <td>{{ $tarifa->nombre }}</td>
                        @break
                    @endif
                @endforeach
            @endif


            <td>{{ HTML::link('/admin/clientes/editar/'.$usuario['id'], 'MODIFICAR') }}</td>
            <td>
                <button  data-toggle="modal" data-target="#modal_{{ $usuario['id'] }}"> <i class="fa fa-times ">BORRAR</i></button>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>

    </table>
</div>






<!-- CONFIRMACIONES BORRAR CLIENTE -->
@foreach($usuarios as $usuario)
    <div id="modal_{{ $usuario->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 class="modal-title">Borrar '{{ $usuario['nombre_contacto'] }}'</h4>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de querer borrar el cliente '{{ $usuario['nombre_contacto'] }}'?<br/>
                    {{ HTML::link('/admin/clientes/eliminar/'.$usuario['id'], 'SI') }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
            <!-- FIN CONFIRMACIONES BORRAR CLIENTE -->




    <script>

        $(document).ready(function(){


            $('A.ajax_bool').click(function(e){
                e.preventDefault();

                var $this = $(this);
                var url = $(this).attr('href');
                var url_arr = url.split("/");
                url_arr.splice( url_arr.indexOf('boolean_ajax')+1 , 3);

                $this.html('<span class="estado_loading">esperando...</span>');

                $.get(url, function(data){

                    //console.log(data);
                    if(!data.error){
                        //data.estado = 1, data.field = activo, data.id = 1;
                        if(data.estado == 1){
                            var span = '<span class="estado_activo">Activo</span>';
                        }else{
                            var span = '<span class="estado_inactivo">Inactivo</span>';
                        }
                        var href = url_arr.join('/')+"/"+data.id+"/"+data.estado+"/"+data.field;

                        if(data.estado == 1){
                            $this.removeClass("btn-danger-alt").addClass("btn-success-alt");
                        }else{
                            $this.removeClass("btn-success-alt").addClass("btn-danger-alt");
                        }

                        $this
                                .attr('href', href)
                                .html(span);


                    }
                }, "json")
                        .fail(function(result) {
                            //console.log(result);
                        });

            }); // FIN DE ACTIVAR/DESACTIVAR POR AJAX


        });


    </script>



@stop