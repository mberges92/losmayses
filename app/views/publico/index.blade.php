@extends('layout')
@section('titulo') Inicio @stop


@section('content')

    <!--banner-->
    <div class="banner">
        <div class="container">
            <div class="banner-text">
                <h1>Una visita dulce con ...</h1>
                <div class="bnr-text-info">
                    <h6><strong>caprichos que endulzan tu vida</strong></h6>
                </div>
            </div>
        </div>
    </div>
    <!--//banner-->
    <!--dishes-->
    <div class="dishes1">
        <div class="container">
            <!-- banner-text Slider starts Here -->
            <script src="js/responsiveslides.min.js"></script>
            <script>
                // You can also use "$(window).load(function() {"
                $(function () {
                    // Slideshow 4
                    $("#slider3").responsiveSlides({
                        auto: true,
                        pager:true,
                        nav:false,
                        speed: 500,
                        namespace: "callbacks",
                        before: function () {
                            $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                        }
                    });
                });
            </script>
            <!--//End-slider-script -->
            <div  id="top" class="callbacks_container">
                <div class="title">
                    <h3>PRODUCTOS DESTACADOS</h3>
                </div>
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="dishes">

                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive"  src="imagenes_mini/brazo2_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Brazo relleno de frambuesa</p>
                                    <h4 class="rs"></h4>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/boda1_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Tarta para los novios</p>
                                    <h4 class="rs"></h4>
                                </div>
                            </div>



                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/pastas3_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Surtido de pastas clásico</p>
                                    <h4 class="rs"></h4>
                                </div>
                            </div>

                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/croissant1_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Croissant artesano recién hecho</p>
                                    <h4 class="rs"></h4>
                                </div>
                            </div>

                            <div class="clearfix"> </div>


                        </div>
                    </li>

                    <li>
                        <div class="dishes">
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/hojaldre1_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Hojaldre con jamón y queso</p>
                                    <h4 class="rs"></h4>

                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/roscon1_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Roscon de nata</p>
                                    <h4 class="rs"></h4>

                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/brazo1_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Brazo de crema y virutas de chocolate</p>
                                    <h4 class="rs"></h4>

                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes_mini/muffin1_m.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Muffin con nata y fresa</p>
                                    <h4 class="rs"></h4>
                                </div>
                            </div>

                            <div class="clearfix"> </div>

                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--//dishes-->
    <!--banner-bottom-->
    <div class="banner-bottom">
        <div class="container">
            <div class="menu-tag">
                <h4>Nosotros somos así.</h4>
            </div>
            <div class="load_more">
                <ul id="myList">
                    <li>
                        <div class="l_g">
                            <div class="l_g_r">
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Los mejores atendiendo a nuestros clientes.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Trabajar en lo que te gusta, no es trabajar ;-)</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Trabajamos de manera artesana.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Servimos nuestros productos frescos, trabajamos al día.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Especialistas en bodas.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Nuestros postres son inigualables.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Tartas de cumpleaños personalizadas.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Creamos recetas atrevidas.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>
                    <li><div class="l_g">
                            <div class="l_g_r g_r">
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Llámanos por teléfono y te atenderemos encantados.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>



                                </div>
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Tenemos aplicacion web para servir a nuestros clientes minoristas.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"></span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>








<!-- LA AGREGO YO -->
                    <li><div class="l_g">
                            <div class="l_g_r g_r">
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Contamos con productos sin gluten.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>


                                </div>
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Elaboramos productos para diabéticos.</h4>
                                            <h6></h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4><img src="imagenes_mini/star.png"   class="img img-responsive estrellita-imagen"></h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>







                </ul>
                <div id="loadMore">Ver más</div>
                <div id="showLess">Ver menos</div>
            </div>
        </div>
    </div>
    <!--//banner-bottom-->
    <!--gallery-->
    <div class="gallery">
        <div class="container">
            <div class="title">
                <h3>GALERÍA</h3>
            </div>
            <div class="gallery-grids">
                <div class="gallery-grids-left glry-img glry-first">
                    <a href="imagenes_zoom/tira1.jpg" class=" mask b-link-stripe b-animate-go   swipebox"  title="Image Title">
                        <img src="imagenes_zoom/tira1_m.jpg" alt="" class="img-responsive zoom-img"/>
                    </a>
                </div>
                <div class="gallery-grids-left">
                    <div class="glry-img">
                        <a href="imagenes_zoom/napo1.jpg" class="swipebox"  title="Image Title">
                            <img src="imagenes_zoom/napo1_m.jpg" alt="" class="img img-responsive zoom-img"/>
                        </a>
                    </div>
                    <div class="glry-img">
                        <a href="imagenes_zoom/tortamanjar1.jpg" class="swipebox"  title="Image Title">
                            <img src="imagenes_zoom/tortamanjar1_m.jpg" alt="" class="img img-responsive zoom-img"/>
                        </a>
                    </div>
                </div>
                <div class="gallery-grids-left">
                    <div class="glry-img">
                        <a href="imagenes_zoom/orejas.jpg" class="swipebox"  title="Image Title">
                            <img src="imagenes_zoom/orejas_m.jpg" alt="" class="img img-responsive zoom-img"/>
                        </a>
                    </div>
                    <div class="glry-img">
                        <a href="imagenes_zoom/pan1.jpg" class="swipebox"  title="Image Title">
                            <img src="imagenes_zoom/pan1_m.jpg" alt="" class="img img-responsive zoom-img"/>
                        </a>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <!--swipebox -->
                <link rel="stylesheet" href="css/swipebox.css">
                <script src="js/jquery.swipebox.min.js"></script>
                <script type="text/javascript">
                    jQuery(function($) {
                        $(".swipebox").swipebox();
                    });
                </script>
                <!--//swipebox Ends -->
            </div>
        </div>
    </div>
    <!--//gallery-->


@stop