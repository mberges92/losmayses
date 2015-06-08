@extends('layout')
@section('titulo') Registro @stop
@section('css_especifico')
    {{HTML::style('css/login_registro.css')}}
@stop

@section('content')





    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login espacio-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="active" id="login-form-link">Registro cliente</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="registro" accept-charset="UTF-8" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="email" name="correo" id="email" tabindex="1" class="form-control" placeholder="Correo" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Crear usuario">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        $(document).ready(function() {
            $('#login-form').validate({
                rules: {
                    correo: {
                        required: true,
                        email: true,
                        minlength: 5,
                        maxlength: 255,
                        remote: "http://" + location.host + "/losmayses/public/validation/comprobar_newCorreo"
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 255
                    }
                } // FIN DE RULES

            });

        });
    </script>

@stop