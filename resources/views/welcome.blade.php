<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Medico medical and health Free HTML5 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content="http://webthemez.com"/>
    <!-- css -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jcarousel.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/flexslider.css')}}" rel="stylesheet"/>
    <link href="{{ asset('js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet"/>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper" class="home-page">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="pull-left hidden-xs">Servicio Medico</p>
                    <p class="pull-right"><i class="fa fa-ambulance"></i>Emergency No. (+001) 123-456-789</p>
                </div>
            </div>
        </div>
    </div>
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li>
                            @if (Auth::check())
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ url('/login') }}">Login</a>
                            @endif
                        </li>
                        <li>
                            @if (Auth::check())
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ url('/register') }}">Register</a>
                            @endif
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <section id="banner">

        <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
                <li>
                    <img src="img/slides/3.jpg" alt=""/>
                    <div class="flex-caption">
                        <h3>HEART SPECIALIST</h3>
                        <p>Doloribus omnis minus temporibus perferquam</p>

                    </div>
                </li>
                <li>
                    <img src="img/slides/1.jpg" alt=""/>
                    <div class="flex-caption">
                        <h3>BETTER CARE</h3>
                        <p>Lorem ipsum dolo amet, consectetur provident.</p>

                    </div>
                </li>

            </ul>
        </div>
        <!-- end slider -->

    </section>
    <section id="call-to-action-2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-9">
                    <h2>Welcome to MEDICO Hospitals</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam,
                        incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam
                        repellendus nulla nemo ipsum odit corrupti</p>
                </div>
            </div>
        </div>
    </section>

    <section id="content">


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aligncenter"><h2 class="aligncenter">Specialties</h2>Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni
                        provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis
                        nesciunt..
                    </div>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="skill-home">
                    <div class="skill-home-solid clearfix">
                        <div class="col-md-3 text-center">
                            <span class="icons c1"><i class="fa fa-ambulance"></i></span>
                            <div class="box-area">
                                <h3>General Check Up</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p></div>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="icons c2"><i class="fa fa-users"></i></span>
                            <div class="box-area">
                                <h3>Dentistry</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p></div>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="icons c3"><i class="fa fa-trophy"></i></span>
                            <div class="box-area">
                                <h3>Dermatology</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p></div>
                        </div>
                        <div class="col-md-3 text-center">
                            <span class="icons c4"><i class="fa fa-globe"></i></span>
                            <div class="box-area">
                                <h3>Dietetics & Nutrition</h3>
                                <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro
                                    consequatur aliquam, incidunt eius magni provident</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="section-padding gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>About Us</h2>
                        <p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada
                            Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor
                            volutpat.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-text">
                        <p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie
                            malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis
                            porttitor volutpat.</p>

                        <ul>
                            <li>Lorem ipsum dolor sit amet</li>
                            <li>consectetur adipiscing elit</li>
                            <li>Curabitur aliquet quam id dui</li>
                            <li>Donec sollicitudin molestie malesuada.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-image">
                        <img src="img/about.jpg" alt="About Images">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="about home-about">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <!-- Heading and para -->
                    <div class="block-heading-two">
                        <h3><span class="fa fa-question-circle"></span> Why Choose Us?</h3>
                    </div>
                    <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                        beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur. <br><br>Sed
                        ut perspiciaatis iste natus error sit voluptatem probably haven't heard of them accusamus.</p>
                </div>
                <div class="col-md-4">
                    <div class="block-heading-two">
                        <h3><span class="fa fa-phone"></span> Our Contact</h3>
                        <hr>
                        <address>
                            <h4>Medico company Inc</h4>
                            <br>JC Main Road, Near Silnile tower Pin-21542<br>
                            NewYork US.
                        </address>
                        <hr>
                        <h4>Call to:</h4>
                        <p>
                            <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
                            <i class="icon-envelope-alt"></i> email@domainname.com
                        </p>
                    </div>

                    <!-- Accordion ends -->

                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <h3><span class="fa fa-clock-o"></span> Our Timings</h3>
                        <hr>
                        <h4>Appointments:</h4>
                        <dl>
                            <dt>Monday - Friday:</dt>
                            <dd>8am-9pm</dd>
                        </dl>
                        <dl>
                            <dt>Saturday & sunday:</dt>
                            <dd>8am-7pm</dd>
                        </dl>
                        <hr>
                        <h4>Emergency:</h4>
                        <dl>
                            <dt>Monday - Friday:</dt>
                            <dd>8am-9pm</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>


    <footer>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>
                                <span>&copy; Medico 2016 All right reserved. By </span><a href="http://webthemez.com" Medico="_blank">WebThemez</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="social-network">
                            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox-media.js')}}"></script>
<script src="{{ asset('js/jquery.flexslider.js')}}"></script>
<script src="{{ asset('js/animate.js')}}"></script>
<!-- Vendor Scripts -->
<script src="{{ asset('js/modernizr.custom.js')}}"></script>
<script src="{{ asset('js/jquery.isotope.min.js')}}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/animate.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<script src="{{ asset('js/owl-carousel/owl.carousel.js')}}"></script>
</body>
</html>