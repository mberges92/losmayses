<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Los mayses - @section('titulo') @show</title>



    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-theme.min.css')}}
    {{HTML::style('css/style.css')}}
</head>
<body>
{{ HTML::link('/cliente/'.Auth::user()->id, 'RESUMEN/INICIO') }}
<br/>
{{ HTML::link('/cliente/'.Auth::user()->id.'/datos', 'DATOS USUARIO') }}
<br/>
{{ HTML::link('/cliente/'.Auth::user()->id.'/tiendas', 'TIENDAS') }}
<br/>
{{ HTML::link('/cliente/'.Auth::user()->id.'/pedidos', 'PEDIDOS') }}




@yield('content')


@if (Auth::check())
    <hr/>
    {{  HTML::link('/logout', '// Cerrar Sesion - '.Auth::user()->correo.' //')  }}
@endif

{{HTML::script('js/jquery-1.11.2.min.js')}}
{{HTML::script('js/bootstrap.min.js')}}
{{-- HTML::script('js/bootstrap-modal.js') --}}

</body>
</html>