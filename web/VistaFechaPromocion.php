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
       
        <?php include_once './index.php ';?>
    </head>
    <body>
        
        <div style="text-align: center">
            <form method="POST" >

                <a>Ingrese fecha</a>
                <input type="date" id="fecha" name="fecha" value="<?php echo date("Y-m-d")?>" >
                <input type="submit" value="Listar" />

            </form>


            <div class="panel " style= "margin: 50px;background-color: #f8efc0">
                <?php include_once './fechapromo.php'; ?>

            </div>
        </div>
    </body>
</html>
