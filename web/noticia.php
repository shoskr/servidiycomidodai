<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        include_once './index.php';
        ?>
    </head>
    <body>
        <div class="section-slogan hidden-xs">
            <div class="row content">

                <div class="container-fluid text-center">    
                    <div class="panel panel-default" style="border: 0;background-color: #000;margin: 10px 10px 10px 10px" >
                        <?php
                        $conexion = new mysqli("localhost", "root", "", "servidoycomido");
                        $reg = $conexion->query("select * from noticia;");
                        ?>

                        <div class="row" style="margin: 20px 20px 20px 20px">

                            <div class="panel panel-default" style="border: 0;border-radius: 5px 60px 5px 5px;;margin: 20px 20px 20px 20px">
                                <div class="panel-title" style="background-color: #e38d13;border-radius: 5px 60px 5px 5px  ;text-align: center">Noticias</div>

                            </div>

                            <?php
                            while ($row = mysqli_fetch_array($reg)) {
                                ?>
                                <form method="POST" action="eliminarNoticia.php">
                                    <div class="col-md-4">
                                        <div class="thumbnail" style="background-color: #000;border: 0">
                                            <h4>
                                                <?php echo $row[3]; ?>
                                            </h4>
                                            <a>
                                                <img src="../imgNoticias/<?php echo $row[4]; ?>" style="width: 200px">  
                                            </a>
                                            <div class="caption">
                                                <a> <?php echo $row[0]; ?></a>
                                                <a> <?php echo $row[1]; ?></a>
                                                <a> <?php echo $row[2]; ?></a>
                                                <a>
                                                    <input type="hidden" name="txtId" value="<?php echo $row[0]; ?>">

                                                </a>


                                            </div>
                                            </tr>

                                        </div>
                                    </div>


                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
