<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    <body style="background-image: url(../img/Fondo_Negro.jpg)">
         <?php include_once './PaginaAdministrador.php';?>
    </head>
        <div class="row content">

            <div class="container-fluid text-center">    
                <div class="panel panel-default" style="border: 0;background-color:rgba(245,245,245,0) ; margin: 10px" >
                    <?php
                    $conexion = new mysqli("localhost", "root", "", "servidoycomido");
                    $reg = $conexion->query("select * from producto;");
                    ?>

                    <div class="row" style="margin: 20px ">
                       
                             <div class="panel panel-default" style="border: 0;border-radius: 5px 60px 5px 5px;margin: 20px 20px 20px 20px">
                                <div class="panel-title" style="background-color: #c0a16b;border-radius: 5px 60px 5px 5px  ;text-align: center">Producto</div>

                            </div>

                            <?php
                            while ($row = mysqli_fetch_array($reg)) {
                                ?>
                                <form method="POST" action="eliminarProducto.php">
                                    <div class="col-md-4">
                                        <div class="thumbnail" style="background-color: #000\9;border: 0">
                                            <h4>
                                                <?php echo $row[1]; ?>
                                            </h4>
                                            <a>
                                                <img src="../imgProducto/<?php echo $row[4]; ?>">  
                                            </a>
                                            <div class="caption">

                                                <a> <?php echo $row[2]; ?></a>
                                                <a> <?php echo $row[3]; ?></a>
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


                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
