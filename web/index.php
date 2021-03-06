<?php
session_start();
session_destroy();
?>
<html lang="en" class=""><head>
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

        <!-- Site Wrapper -->
        <div id="site-wrapper" style="margin: 10px">
            <!-- Header -->
            <header id="site-header">

                <div class="navbar is-sticky" role="navigation">
                    <div class="container">
                        <div class="row">
                            <h1 class="sr-only">Food Lover</h1>
                            <a href="index.php" title="FoodLover" class="logo">
                                <img src="../Baners/Icono2.png">
                            </a>
                            <button data-target=".navbar-collapse" data-toggle="collapse" type="button" class="menu-mobile visible-xs">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <ul class="nav navbar-nav navbar-collapse collapse">
                                <li><a class="active" href="Home.php">Home</a></li>
                                <li><a class="" href="VistaFechaPromocion.php">Promociones</a></li>
                                <li><a class="" href="productos.php">Productos</a></li>	
                                <li><a class="" href="noticia.php">Noticias</a></li>
                                <li><a class="" href="login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

        </div>

    </body>
</html>