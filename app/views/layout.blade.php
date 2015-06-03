<!DOCTYPE html>
<html lang="es">
<head>
    <title>Los mayses - @section('titulo') @show</title>
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/style.css')}}
    @section('css_especifico') @show

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pabulum Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{HTML::script('js/jquery-1.11.2.min.js')}}
    <script src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--//end-smoth-scrolling-->
    <script>
        $(document).ready(function () {
            size_li = $("#myList li").size();
            x=1;
            $('#myList li:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+1 <= size_li) ? x+1 : size_li;
                $('#myList li:lt('+x+')').show();
            });
            $('#showLess').click(function () {
                x=(x-1<0) ? 1 : x-1;
                $('#myList li').not(':lt('+x+')').hide();
            });
        });
    </script>

    {{HTML::script('js/bootstrap.min.js')}}
    {{ HTML::script('js/jquery.validate.min.js') }}
    {{ HTML::script('js/messages_es.js') }}
    {{ HTML::script('js/cifES.js') }}
    {{ HTML::script('js/jquery-ui.js') }}

    {{-- HTML::style('css/bootstrap-theme.min.css') --}}
    {{-- HTML::style('css/jquery-ui.min.css') --}}
    {{HTML::style('css/swipebox.css')}}
    {{-- HTML::style('css/style_boot_modal.css') --}}


    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
</head>
<body>


<div class="header">
    <div class="container">
        <div class="header-logo">
            <a href="/losmayses/public/"><img src="images/logo.png" alt="logo"/></a>
        </div>
        <div class="top-nav">
            <span class="menu"><img src="images/menu-icon.png" alt=""/></span>
            <ul class="nav1 cl-effect-5">



                @if (Request::is('/'))
                    <li><a href="/losmayses/public/" class="active"><span data-hover="Nosotros">Nosotros</span></a></li>
                @else
                    <li><a href="/losmayses/public/"><span data-hover="Nosotros">Nosotros</span></a></li>
                @endif

                @if (Request::is('productos'))
                    <li><a href="/losmayses/public/productos" class="active"><span data-hover="Productos">Productos</span></a></li>
                @else
                    <li><a href="/losmayses/public/productos"><span data-hover="Productos">Productos</span></a></li>
                @endif

                @if(Request::is('contacto'))
                    <li><a href="/losmayses/public/contacto" class="active"><span data-hover="Contacto">Contacto</span></a></li>
                @else
                    <li><a href="/losmayses/public/contacto"><span data-hover="Contacto">Contacto</span></a></li>
                @endif

                    @if(Auth::check() && Auth::user()->rol == "admin")
                        <li><a href="/losmayses/public/admin"><span data-hover="Administración">Administración</span></a></li>
                        <li><a href="/losmayses/public/logout"><span data-hover="Desconectar">Desconectar</span></a></li>

                    @elseif(Auth::check() && Auth::user()->rol == "cliente")
                        <li><a href="/losmayses/public/cliente/{{ Auth::user()->id }}"><span data-hover="{{ Auth::user()->correo }}
">{{ Auth::user()->correo }}
</span></a></li>
                        <li><a href="/losmayses/public/logout"><span data-hover="Desconectar">Desconectar</span></a></li>
                    @else

                        @if(Request::is('login'))
                            <li><a href="/losmayses/public/login" class="active"><span data-hover="Login">Login</span></a></li>
                        @else
                            <li><a href="/losmayses/public/login"><span data-hover="Login">Login</span></a></li>
                        @endif


                        @if(Request::is('registro'))
                            <li><a href="/losmayses/public/registro" class="active"><span data-hover="Registro">Registro</span></a></li>
                        @else
                            <li><a href="/losmayses/public/registro"><span data-hover="Registro">Registro</span></a></li>
                        @endif


                    @endif

            </ul>
            <!-- script-for-menu -->
            <script>
                $( "span.menu" ).click(function() {
                    $( "ul.nav1" ).slideToggle( 300, function() {
                        // Animation complete.
                    });
                });
            </script>
            <!-- /script-for-menu -->
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--//header-->


@yield('content')


<!--footer-->
<div class="footer">
    <div class="container">
        <div class="col-md-4 footer-left">
            <ul>
                <li>Obrador Pastelería Los Mayses</li>
                <li>C/ Miguel Servet, 5</li>
                <li>Zaragoza, Zaragoza</li>
                <li>50002</li>
            </ul>
        </div>
        <!--<div class="col-md-4 footer-left">
             <ul>
                <li>France Restaurant</li>
                <li>68, rue  de la Couronne</li>
                <li>75002 PARIS</li>
                <li>02.94.23.69.56</li>
            </ul>
        </div>-->
        <div class="col-md-4 footer-left">
            <ul>
                <li><a href="/losmayses/public/">Nosotros</a></li>
                <li><a href="/losmayses/public/productos">Productos</a></li>
                <li><a href="/losmayses/public/contacto">Contacto</a></li>
            </ul>
        </div>
        <div class="col-md-4 footer-right">
            <a href="index.html"><img src="images/footer-logo.png" alt="logo"/></a>
            <p>© 2015 Todos los derechos reservados | Diseñado por <a href="http://w3layouts.com/"> W3layouts</a></p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--//footer-->
<!--smooth-scrolling-of-move-up-->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!--//smooth-scrolling-of-move-up-->




</body>
</html>