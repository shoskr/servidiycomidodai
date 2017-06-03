
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php include_once './PaginaAdministrador.php'; ?>
        <?php $conexion = new mysqli("localhost", "root", "", "servidoycomido"); ?>

        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <form method="post" action="GuardarUsuario.php">
                            <table class="table text-center">
                                <tr>
                                    <td colspan="2" class="text-center"><font size="5">Crear Usuario</font></td>
                                </tr>

                                <tr>
                                    <td>Nombre Usuario :</td>
                                    <td><input type="text" value=""name="txtUsu"> </td>                       
                                </tr>
                                <tr>
                                    <td> Password : </td>
                                    <td> <input type="password" value=""name="txtPass"> </td>                       
                                </tr>

                                <tr>
                                    <td>Usuario :</td>
                                    <td> 
                                        <select name="cboEmp">
                                            <?php
                                            $sql = $conexion->query("select * from empleado;");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </td>                       
                                </tr>
                                <tr>
                                    <td> <input type="submit" value="Grabar"></td>

                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
