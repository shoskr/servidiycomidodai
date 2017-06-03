<html lang="en" class="">
    <head>

        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script>
            $(document).ready(function () {
                $('#Producto').click(function () {
                    $("#contenido").load("ProductoVista.php");
                });

                $('#Promocion').click(function () {
                    $("#contenido").load("PromocionVista.php");
                });

                $('#Noticia').click(function () {
                    $("#contenido").load("Noticiavista.php");
                });
            });
        </script>

        <!--   -->
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="author" content="Egprojets">
        <meta name="description" content="">
        <title>Stage Burger - Burgueria Gourmet</title>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,700,300">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300">
        <!-- End Google Fonts -->

        <!-- Contribute CSS Files -->
        <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <!-- Contribute End CSS Files -->

        <!-- Custom CSS Files -->
        <link rel="stylesheet" href="../css/Style.css">
        <link rel="stylesheet" href="../css/">
        <style type="text/css">
            .pointer-slide{
                position: absolute;
                right: 2%;
                top: 50%;
                z-index: 9;
            }
            .mapa iframe{
                width: 100%;
                height: 600px;
            }


            
        </style>
        <!-- Custom CSS Files -->
        <link rel="stylesheet" href="assets/css/default.css" type="text/css" media="screen">
        <link rel="stylesheet" href="assets/css/nivo-slider.css" type="text/css" media="screen">

        <style type="text/css">.fancybox-margin{margin-right:17px;}</style></head>

    <body style="background-image: url(../img/Fondo_Negro.jpg)">

        <!-- Loader Bloc -->
        <div class="site-loader" style="display: none;">
            <div class="loading"></div>
        </div>
        <!-- End Loader Bloc -->

        <!-- MENU-->
        <div id="site-wrapper">

            <header id="site-header">

                <div class="navbar is-sticky" role="navigation">
                    <div class="container">
                        <div class="row">
                            <h1 class="sr-only">Food Lover</h1>
                            <a href="Home.php" title="FoodLover" class="logo">
                                <img src="../Baners/Icono33.png">
                            </a>
                            <button data-target=".navbar-collapse" data-toggle="collapse" type="button" class="menu-mobile visible-xs">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <ul class="nav navbar-nav navbar-collapse collapse">
                                <li><a class="active" href="index.php">Home</a></li>
                                <li><a class="" href="PromocionVista.php">Promociones</a></li>
                                <li><a class="" href="ProductoVista.php">Productos</a></li>	
                                <li><a class="" href="Noticiavista.php">Noticias</a></li>
                                <li><a class="" href="login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <div style="margin: 100px 20px 20px 20px">
                <div class="container" style="padding-top: 1em;" width="100" height="100"> 


                    <!--INICIO CARRUCEL-->
                    <div class="col-xs-10 col-xs-offset-1 " >

                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="he">
                            <div class="section-slogan hidden-xs" style="margin: -20px 100px 100px 20px ;text-align: center" >
                                <img src="../Baners/Icono3.png" alt="">
                                <h2>todo los dia um nuevo sabor!</h2>
                                <h3>Servido Y Comido</h3>
                            </div>
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner " role="listbox" >
                                <div class="item active" style="border:60px 20px ">
                                    <img src="../Baners/baner1.png" alt="Facebook" class="img-responsive" >
                                </div>
                                <div class="item">
                                    <img src="../Baners/baner2.png" alt="Geolocalisacion" class="img-responsive">
                                </div>
                                <div class="item">
                                    <img src="../Baners/baner3.png" alt="Geolocalisacion" class="img-responsive">
                                </div>
                                <div class="item">
                                    <img src="../Baners/baner4.png" alt="Geolocalisacion" class="img-responsive">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div  class="section-slogan hidden-xs" style="margin: 200px 10px 10px 30px ;text-align: center">
                <a href="#" id="Producto">Python</a>
                <a href="#" id="Promocion">Django</a>
                <a href="#" id="Noticia">Jython</a>
                <br>
                <div  class="section-slogan hidden-xs" style="margin: 200px 10px 10px 30px ;text-align: center">
                    <table border="1" >
                        <tr>

                            <td id ="contenido">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>



        <div>
            <section id="apps" class="padd-10 padd-bottom-100 padd-top-100 " >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="desc-apps">
                                <span class="section-suptitle">Nuestro Creador</span>
                                <h2 class="section-title">Claudio Nicolier Fernandez</h2>
                                <p>
                                </p>
                                <b class="big-title">Creador de Servido y Comido
                                    1998 Comenso la fama Y hoy en dia es uno de las cadenas de comida rapida mas famosas en CHILE.</b>
                                <p>
                                </p>
                                <div class="col-sm-4" style="margin:0 0 25px 0">
                                    <a href="#">
                                        <img src="../Baners/dueño de syc.jpg" style="margin: 50px 400px">
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <!-- Footer -->
        <footer id="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="bloc-cms">
                            <img src="../Baners/icono4.png" alt="">
                            <p>
                            </p>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="open-hours">
                            <span class="foot-title">FUNCIONAMENTO</span>
                            <p><span>Locales</span></p>

                            <p><span>DOM - QUI : </span>..............&nbsp;12h - 23:00h</p>

                            <p><span>SEX - SÁB : </span>.............. 12h - 01h</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="footer-copyright">				
                <a href="">Top</a>
            </div>
            <div class="bottom-rodape">
                <p class="espaco">
                    Stage Burger - 2016 - Todos os direitos Reservados - Produzido por: SYC</a> 
                </p>
                <div>
                </div>

            </div>
        </footer>
        <!-- End Footer -->


        <!-- End Site Wrapper -->

        <!-- Contribute JS Files 
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
        <script type="text/javascript" src="assets/js/egprojets.lib.js"></script>
        <!-- End Contribute JS Files -->

        <!-- Custom JS Files -->
        <script type="text/javascript" src="assets/js/egprojets.custom.js"></script>
        <!-- Custom JS Files -->


        <script type="text/javascript" src="assets/js/jquery.nivo.slider.js"></script>
        <script type="text/javascript">

        </script>

    </body>

</html>