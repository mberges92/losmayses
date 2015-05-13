<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Los mayses - @section('titulo') @show</title>

    {{HTML::script('js/jquery-1.11.2.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-theme.min.css')}}
    {{HTML::style('css/style.css')}}
</head>
<body>

@if(Auth::check() && Auth::user()->rol == "doble")
<h2>{{ HTML::link('/admin', 'ADMINISTRACION') }}</h2>
<h2>{{ HTML::link('/cliente/'.Auth::user()->id, 'CLIENTE') }}</h2>
@endif

<hr/>


@if(Auth::check() && Auth::user()->rol == "Admin")
    {{ HTML::link('/admin', 'ADMINISTRACION') }}
    <br/>
    {{ HTML::link('/logout', 'LOGOUT - '.Auth::user()->username) }}
@elseif(Auth::check() && Auth::user()->rol == "Usuario")
    {{ HTML::link('/cliente', 'MI CUENTA DE CLIENTE') }}
    <br/>
    {{ HTML::link('/logout', 'LOGOUT - '.Auth::user()->username) }}
@elseif(Auth::check())
    {{ HTML::link('/logout', 'LOGOUT - '.Auth::user()->username) }}
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