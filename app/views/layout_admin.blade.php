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
@yield('content')


@if (Auth::check())
    <hr/>
    {{  HTML::link('/logout', '// Cerrar Sesion - '.Auth::user()->username.' //')  }}
@endif
</body>
</html>