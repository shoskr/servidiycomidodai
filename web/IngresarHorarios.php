<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>      
        <?php
        include_once './PaginaAdministrador.php';
        ?>
        <?php $conexion = new mysqli("localhost", "root", "", "servidoycomido"); ?>
        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form method="post" action="GuardarHorarios.php">
                            <table>
                                <tr>
                                    <td colspan="2" class="text-center">Asignacion de Horarios</td>
                                </tr>
                                <tr>
                                    <td>empleado</td> 
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
                                    <td>Dias</td> 
                                    <td>
                                        <input type="checkbox" name="Dia[]" value="Lunes" />Lunes
                                        <input type="checkbox" name="Dia[]" value="Martes" />Martes
                                        <input type="checkbox" name="Dia[]" value="Miercoles" />Miercoles
                                        <input type="checkbox" name="Dia[]" value="Jueves" />Jueves
                                        <input type="checkbox" name="Dia[]" value="Viernes" />Viernes
                                        <input type="checkbox" name="Dia[]" value="Sabado" />Sabado
                                        <input type="checkbox" name="Dia[]" value="Domingo" />Domingo

                                    </td> 
                                </tr>

                                <tr>
                                    <td>Semana</td> 
                                    <td>
                                        Desde <input type="date" name="FechaInicio" step="1" min="2013-01-01" max="2020-12-31" value="2017-05-18">

                                        Hasta <input type="date" name="FechaTermino" step="1" min="2013-01-01" max="2020-12-31" value="2017-05-18">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Turno</td> 
                                    <td>
                                        <input type="radio" name="Turno" value="MAÑANA"checked="true" />MAÑANA
                                        <input type="radio" name="Turno" value="TARDE" />TARDE
                                        <input type="radio" name="Turno" value="NOCHE"  />NOCHE

                                    </td> 
                                </tr>
                                <tr>
                                    <td>Local :</td>

                                    <td>
                                        <select name="cboLocal">
                                            <?php
                                            $sql = $conexion->query("select * from local;");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr> 
                                    <td><input type="submit" value="Guardar"> </td> 
                                </tr>                          

                            </table>
                        </form>
                    </div>            
                </div>
            </div>
        </div>

        <div class=" row">
            <div class="col-md-offset-1 col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        $sql = $conexion->query("call listarh();");
                        ?>    

                        <table class="table text-center">
                            <tr>
                                <td>Semana</td>
                                <td>Nombre</td>
                                <td>Dias</td>
                                <td>Fecha</td>
                                <td>Turno</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><font size="2"><?php echo $row[0] ?> </font></td>
                                    <td><font size="2"><?php echo $row[1] ?> </font></td>
                                    <td><font size="2"><?php echo $row[2] ?> </font></td>
                                    <td><font size="2"><?php echo $row[3] ?> </font></td>
                                    <td><font size="2"><?php echo $row[4] ?> </font></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
