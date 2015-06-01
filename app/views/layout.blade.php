<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Los mayses - @section('titulo') @show</title>

    {{HTML::script('js/jquery-1.11.2.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{ HTML::script('js/jquery.validate.min.js') }}
    {{ HTML::script('js/messages_es.js') }}
    {{ HTML::script('js/cifES.js') }}
    {{ HTML::script('js/jquery-ui.js') }}

    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-theme.min.css')}}
    {{HTML::style('css/jquery-ui.min.css')}}
    {{HTML::style('css/style.css')}}
</head>
<body>



@if(Auth::check() && Auth::user()->rol == "admin")
    {{ HTML::link('/admin', 'ADMINISTRACION') }}
    <br/>
    {{ HTML::link('/logout', 'LOGOUT - '.Auth::user()->correo) }}
@elseif(Auth::check() && Auth::user()->rol == "cliente")

    {{ HTML::link('/cliente/'.Auth::user()->id, 'MI CUENTA DE CLIENTE') }}
    <br/>
    {{ HTML::link('/logout', 'LOGOUT - '.Auth::user()->correo) }}
@elseif(Auth::check())
    {{ HTML::link('/logout', 'LOGOUT - '.Auth::user()->correo) }}
@else
    {{ HTML::link('/login', 'LOGIN') }}
    <br/>
    {{ HTML::link('/registro', 'REGISTRAR NUEVO USUARIO') }}
@endif



<hr/>
{{ HTML::link('/', 'INICIO') }}
<br/>
{{ HTML::link('/trabajos', 'TRABAJOS/GALERIA') }}
<br/>
{{ HTML::link('/contacto', 'CONTACTO') }}




@yield('content')



</body>
</html>