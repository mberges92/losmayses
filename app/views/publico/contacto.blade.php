@extends('layout')
@section('titulo') Contacto @stop


@section('content')

    <div class="container">
        <div class="row">



            <form role="form" class="col-md-9 go-right" id="formContactoPublico">
                <h2>¡Te respondemos!</h2>
                <p>Ponte en contacto con nosotros a solo un click</p>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" class="form-control" required>
                    <span id="er1"></span>
                </div>

                <div class="form-group">
                    <label for="correo">Email</label>
                    <div class="input-group">
                        <!--
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </span>
                        -->
                        <input id="correo" name="correo" type="text" class="form-control" required>
                    </div>
                    <span id="er2"></span>
                </div>
                <div class="form-group">
                    <label for="message">Mensaje</label>
                    <textarea rows="10" id="message" name="message" class="form-control" required></textarea>
                    <span id="er3"></span>
                </div>


                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                </div>


                </form>



        </div>
    </div>



    <script>

        $('#formContactoPublico').validate({
            rules: {
                correo: {
                    required: true,
                    email: true,
                    minlength: 5,
                    maxlength: 255
                },
                name: {
                    required: true,
                    maxlength: 255
                },
                message: {
                    required: true,
                    maxlength: 255
                }
            } // FIN DE RULES
        });

    </script>



@stop