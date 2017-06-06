
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
                        <form method="post" action="ParaModifEmpleado.php">
                            <table class="table text-center">
                                <tr>
                                    <td>Trabajador</td>
                                    <td>
                                        <select name="cboEmp">
   
                                            <?php
                                            $sql = $conexion->query("select * from empleado order by nombre;");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                if ($row[8] == 1) {
                                                    ?>
                                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>                                               
                                        </select>

                                    </td>
                                    <td>
                                        <select name="cboAtivado">
                                            <option value="1">Ativo</option>
                                            <option value="2">Desactivar</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td> <input type="submit" value="Desactivar" id="btnBuscar" />  </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
