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

    {{HTML::style('css/style_boot_modal.css')}}

</head>
<body>
{{ HTML::link('/admin', 'RESUMEN/INICIO') }}
<br/>
{{ HTML::link('/admin/pedidos', 'PEDIDOS') }}
<br/>
{{ HTML::link('/admin/clientes', 'CLIENTES') }}
<br/>
{{-- HTML::link('/admin/tiendas', 'TIENDAS') --}}
<!-- <br/> -->
{{ HTML::link('/admin/tarifas', 'TARIFAS') }}
<br/>
{{ HTML::link('/admin/categorias', 'CATEGORIAS') }}
<br/>
{{ HTML::link('/admin/productos', 'PRODUCTOS') }}
<br/>
{{-- HTML::link('/admin/facturacion', 'FACTURACION') --}}
<br/>
{{-- HTML::link('/admin/estadisticas', 'ESTADISTICAS') --}}
<hr/>


@yield('content')


@if (Auth::check())
    <hr/>
    {{  HTML::link('/logout', '// Cerrar Sesion - '.Auth::user()->correo.' //')  }}
@endif
</body>
</html>
