
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include_once './index.php ';?>
    </head>
    <body style="background-image: url(../img/Fondo_Negro.jpg)">

        <div class="row content">

            <div class="container-fluid text-center">    
                <div class="panel panel-default" style="border: 0;background-color: #000;margin: 10px 10px 10px 10px" >
                    <?php
                    $conexion = new mysqli("localhost", "root", "", "servidoycomido");
                    $reg = $conexion->query("select * from promocion;");
                    ?>

                    <div class="row" style="margin: 20px 20px 20px 20px">

                        <div class="panel panel-default" style="border: 0;border-radius: 5px 60px 5px 5px;margin: 20px 20px 20px 20px">
                            <div class="panel-title" style="background-color: #c0a16b;border-radius: 5px 60px 5px 5px  ;text-align: center">Promociones</div>

                        </div>

                        <?php
                        while ($row = mysqli_fetch_array($reg)) {
                            ?>
                            <form method="POST" action="eliminarPromocion.php">
                                <div class="col-md-4">
                                    <div class="panel panel-default" style="background-color: #b2dba1"
                                         <div class="thumbnail" style="background-color: #000\9;border: 0">
                                            <h4>
                                                <?php echo $row[4]; ?>--<?php echo $row[3]; ?>
                                            </h4>
                                            <a>
                                                <img src="../imgPromocion/<?php echo $row[5]; ?>" style=" ">  
                                            </a>
                                            <div class="caption">
                                                <a> <?php echo $row[0]; ?></a>
                                                <a> <?php echo $row[1]; ?></a><br>
                                                <a> <?php echo $row[2]; ?></a>
                                                <a>
                                                    <input type="hidden" name="txtId" value="<?php echo $row[0]; ?>">

                                                </a>
                                                <br>

                                                <input type="submit" name="E<?php echo $row[0]; ?>" value="Eliminar" />
                                                </a>

                                            </div>
                                            </tr>

                                        </div>
                                    </div>   
                                </div>


                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

