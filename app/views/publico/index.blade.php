@extends('layout')
@section('titulo') Inicio @stop


@section('content')

    <!--banner-->
    <div class="banner">
        <div class="container">
            <div class="banner-text">
                <h1>Una visita dulce con ...</h1>
                <div class="bnr-text-info">
                    <h6>caprichos que endulzan tu vida</h6>
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
                                <img class="img-responsive"  src="imagenes/brazo_gitano1.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Fugiat nulla sint</p>
                                    <h4 class="rs">$ 30</h4>
                                    <ul>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes/tarta_boda1.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Daute irure dolor</p>
                                    <h4 class="rs">$24</h4>
                                    <ul>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes/pastas1.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Officia deserunt</p>
                                    <h4 class="rs">$60</h4>
                                    <ul>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes/croissant1.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Pim minim veniam</p>
                                    <h4 class="rs">$17</h4>
                                    <ul>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#"></a> </li>
                                        <li><a href="#" class="gry-str"></a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </li>
                    <li>
                        <div class="dishes">
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes/hojaldre1.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Fugiat nulla sint</p>
                                    <h4 class="rs">$30</h4>
                                    <ul>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="imagenes/roscon1.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Daute irure dolor</p>
                                    <h4 class="rs">$24</h4>
                                    <ul>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a> </li>
                                        <li><a href="#"> </a> </li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="images/img30.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Officia mollit</p>
                                    <h4 class="rs">$60</h4>
                                    <ul>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 dishes-grids">
                                <img class="img-responsive" src="images/img31.jpg" alt="" title=""/>
                                <div class="dishes-text">
                                    <p>Pim minim veniam</p>
                                    <h4 class="rs">$17</h4>
                                    <ul>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#"> </a></li>
                                        <li><a href="#" class="gry-str"> </a></li>
                                    </ul>
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
                <h4>Filosofía</h4>
            </div>
            <div class="load_more">
                <ul id="myList">
                    <li>
                        <div class="l_g">
                            <div class="l_g_r">
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Voluptate cillum fugiat.</h4>
                                            <h6>Cheese, tomato, mushrooms, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$ 50</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Metus varius laoreet.</h4>
                                            <h6>Chicken, mozzarella cheese, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$62</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Donec sodales magna.</h4>
                                            <h6>Tuna, Sweetcorn, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$25</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Saugue velit cursus.</h4>
                                            <h6>Pineapple, Minced Beef, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$30</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Arcu pede enim justo.</h4>
                                            <h6>Tuna, Sweetcorn, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$50</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Cras dapibussemper nisi.</h4>
                                            <h6>Pineapple, Minced Beef, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$62</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Quam semper libero.</h4>
                                            <h6>Cheese, tomato, mushrooms, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$25</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Nam eget dui Etiam.</h4>
                                            <h6>Chicken, mozzarella cheese, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$30</h4>
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
                                            <h4>Voluptate cillum fugiat.</h4>
                                            <h6>Cheese, tomato, mushrooms, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$50</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Metus varius laoreet.</h4>
                                            <h6>Chicken, mozzarella cheese, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$62</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Donec sodales magna.</h4>
                                            <h6>Tuna, Sweetcorn, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$25</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Saugue velit cursus.</h4>
                                            <h6>Pineapple, Minced Beef, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$30</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Arcu pede enim justo.</h4>
                                            <h6>Tuna, Sweetcorn, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"></span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$50</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Cras dapibussemper nisi.</h4>
                                            <h6>Pineapple, Minced Beef, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$62</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Quam semper libero.</h4>
                                            <h6>Cheese, tomato, mushrooms, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$25</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Nam eget dui Etiam.</h4>
                                            <h6>Chicken, mozzarella cheese, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$30</h4>
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
                                            <h4>Voluptate cillum fugiat.</h4>
                                            <h6>Cheese, tomato, mushrooms, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$50</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Metus varius laoreet.</h4>
                                            <h6>Chicken, mozzarella cheese, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$62</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Donec sodales magna.</h4>
                                            <h6>Tuna, Sweetcorn, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$25</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Saugue velit cursus.</h4>
                                            <h6>Pineapple, Minced Beef, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$30</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6 menu-grids">
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Arcu pede enim justo.</h4>
                                            <h6>Tuna, Sweetcorn, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$50</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Cras dapibussemper nisi.</h4>
                                            <h6>Pineapple, Minced Beef, Cheese.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$62</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Quam semper libero.</h4>
                                            <h6>Cheese, tomato, mushrooms, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$25</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="menu-text">
                                        <div class="menu-text-left">
                                            <h4>Nam eget dui Etiam.</h4>
                                            <h6>Chicken, mozzarella cheese, onions.</h6>
                                        </div>
                                        <div class="menu-text-midle">
                                            <span class="line"> </span>
                                        </div>
                                        <div class="menu-text-right">
                                            <h4>$30</h4>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div id="loadMore">load more</div>
                <div id="showLess">show less</div>
            </div>
        </div>
    </div>
    <!--//banner-bottom-->
    <!--gallery-->
    <div class="gallery">
        <div class="container">
            <div class="title">
                <h3>THE GALLERY</h3>
            </div>
            <div class="gallery-grids">
                <div class="gallery-grids-left glry-img glry-first">
                    <a href="images/img6.jpg" class=" mask b-link-stripe b-animate-go   swipebox"  title="Image Title">
                        <img src="images/img6.jpg" alt="" class="img-responsive zoom-img"/>
                    </a>
                </div>
                <div class="gallery-grids-left">
                    <div class="glry-img">
                        <a href="images/img7.jpg" class="swipebox"  title="Image Title">
                            <img src="images/img7.jpg" alt="" class="img-responsive zoom-img"/>
                        </a>
                    </div>
                    <div class="glry-img">
                        <a href="images/img8.jpg" class="swipebox"  title="Image Title">
                            <img src="images/img8.jpg" alt="" class="img-responsive zoom-img"/>
                        </a>
                    </div>
                </div>
                <div class="gallery-grids-left">
                    <div class="glry-img">
                        <a href="images/img9.jpg" class="swipebox"  title="Image Title">
                            <img src="images/img9.jpg" alt="" class="img-responsive zoom-img"/>
                        </a>
                    </div>
                    <div class="glry-img">
                        <a href="images/img10.jpg" class="swipebox"  title="Image Title">
                            <img src="images/img10.jpg" alt="" class="img-responsive zoom-img"/>
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