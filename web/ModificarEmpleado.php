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
    </head>
    <body>
        <?php
        include_once './PaginaContador.php';
        ?>
        <?php $conexion = new mysqli("localhost", "root", "", "servidoycomido"); ?>
        <div class=" row">
            <div class="col-md-offset-2 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <form method="post" action="GenerarLiqu.php">
                            <table class="table text-center">
                                <tr>
                                    <td>Trabajador</td>
                                    <td>
                                        <select name="cboEmp">
                                            <?php
                                            $sql = $conexion->query("select * from empleado order by nombre asc;");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2] ?></option>
                                                <?php
                                            }
                                            ?>                                                
                                        </select>

                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
