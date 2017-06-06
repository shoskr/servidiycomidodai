
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './PaginaContador.php';
        $conexion = new mysqli("localhost", "root", "", "servidoycomido");
        ?>
        <script>
            $(document).ready(function (event) {
                $("#btnListar").click(function () {
                    $("#txtAccion").val("Listar");
                    $.ajax({
                        type: 'POST',
                        url: "LiquidacionlistarPDF.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    });
                });
                $("#btnLIiqu").click(function () {
                    $("#txtAccion").val("Ingresar");
                    $.ajax({
                        type: 'POST',
                        url: "GenerarLiqu.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    });
                });
            });
        </script>
        <div class=" row">
            <div class="col-md-offset-2 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div>
                            <form id="formu">
                                <table class="table text-center">
                                    <tr>
                                        <td>Trabajador</td>
                                        <td>
                                            <select name="cboEmp">
                                                <?php
                                                 
                                                $sql = $conexion->query("select * from empleado;");

                                                while ($row = mysqli_fetch_array($sql)) {
                                                   if($row[8]== 1){
                                                    ?>
                                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2] ?></option>
                                                    <?php
                                                   }
                                                }
                                                ?>                                                
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Periodo</td> 
                                        <td>
                                            <select name="cboPeriodo">
                                                <option value<?php echo "01-" . date("y") ?>><?php echo "01-" . date("y") ?></option>
                                                <option value<?php echo "02-" . date("y") ?>><?php echo "02-" . date("y") ?></option>
                                                <option value<?php echo "03-" . date("y") ?>><?php echo "03-" . date("y") ?></option>
                                                <option value<?php echo "04-" . date("y") ?>><?php echo "04-" . date("y") ?></option>
                                                <option value<?php echo "05-" . date("y") ?>><?php echo "05-" . date("y") ?></option>
                                                <option value<?php echo "06-" . date("y") ?> selected="selected"><?php echo "06-" . date("y") ?></option>
                                                <option value<?php echo "07-" . date("y") ?>><?php echo "07-" . date("y") ?></option>
                                                <option value<?php echo "08-" . date("y") ?>><?php echo "08-" . date("y") ?></option>
                                                <option value<?php echo "09-" . date("y") ?>><?php echo "09-" . date("y") ?></option>
                                                <option value<?php echo "10-" . date("y") ?>><?php echo "10-" . date("y") ?></option>
                                                <option value<?php echo "11-" . date("y") ?>><?php echo "11-" . date("y") ?></option>
                                                <option value<?php echo "12-" . date("y") ?>><?php echo "12-" . date("y") ?></option>
                                            </select>


                                    </tr>

                                    <tr>
                                        <td>Registro Faltas mes</td>
                                        <td> <input type="number" name="txtAusencias" /> </td>
                                    </tr>
                                    <tr>
                                        <td>Dias Licencia</td>
                                        <td><input type="number" name="txtLicencias" /></td>
                                    </tr>
                                    <tr>
                                        <td>Bono</td>
                                        <td><input type="number" name="txtBonos" /></td>
                                    </tr><tr>
                                        <td>Aguinaldo</td>
                                        <td><input type="number" name="txtAgisnaldo" /></td>
                                    </tr>
                                    <tr>
                                        <td><td>
                                        <td>
                                            <input type="button" value="Ingresar" id="btnLIiqu" />
                                            <input type="button" value="Listar" id="btnListar" />
                                        </td>
                                    </tr>

                                </table>
                                <input type="hidden" id="txtAccion" name="txtAccion">
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-offset-2 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div id="respuesta">

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
