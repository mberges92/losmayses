<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Los mayses - @section('titulo') @show</title>

    {{HTML::style('css/admin_layout/font-awesome.min.css')}}
    {{HTML::style('css/style.admin.min.css')}}





    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/losmayses/public/js/jquery-1.11.2.min.js"></script>
</head>
<body>



<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/losmayses/public/admin">Administracion</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="/losmayses/public/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="/losmayses/public/admin/clientes"><i class="fa fa-bar-chart-o fa-fw"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="/losmayses/public/admin/tarifas"><i class="fa fa-table fa-fw"></i> Tarifas</a>
                    </li>
                    <li>
                        <a href="/losmayses/public/admin/productos"><i class="fa fa-edit fa-fw"></i> Productos</a>
                    </li>
                    <li>
                        <a href="/losmayses/public/admin/categorias"><i class="fa fa-wrench fa-fw"></i> Categorias</a>
                    </li>


                    <li>
                        <a href="/losmayses/public/admin/pedidos"><i class="fa fa-files-o fa-fw"></i> Pedidos</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">

        @yield('content')

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script src="/losmayses/public/js/admin_layout.min.js"></script>


@section('script_pagina') @show










</body>
</html>
