@extends('layout')
@section('titulo') Contacto @stop


@section('content')




    <div class="container">
        <div class="row espacio-login">


            <div class="col-md-6">


                <form role="form" class="go-right" id="formContactoPublico">


                    <h2>¡Te respondemos!</h2>
                    <p>Ponte en contacto con nosotros a solo un click</p>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <div class="input-group">

                            <input id="name" name="name" type="text" class="form-control" size="100" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="correo">Email</label>
                        <div class="input-group">
                            <input id="correo" name="correo" type="text" class="form-control" size="100" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Mensaje</label>
                        <textarea rows="10" id="message" name="message" class="form-control" required></textarea>

                    </div>


                    <div class="form-group">

                            <button type="submit" class="btn btn-lg btn-primary btn-block">Enviar</button>

                    </div>



                </form>


            </div>


            <div class="col-md-6">
                <div style="padding-top: 17%;padding-right: 5%;padding-left: 5%;" class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.341200141512!2d-0.874810204877899!3d41.64836950792246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5914f07947aacb%3A0xe8be1693f4ab0552!2sObrador+Pasteleria+Las+Navas+SL!5e0!3m2!1ses!2ses!4v1433607845725" width="400" height="300" frameborder="0" style="border:0"></iframe>
                </div>
            </div>



        </div>
    </div>

    <div class="espacio-footer"></div>






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