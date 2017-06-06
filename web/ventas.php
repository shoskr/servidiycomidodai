
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './PaginaVentas.php';
        ?>

        <script>
            $(document).ready(function (event) {
                $("#btnAgregar").click(function () {
                    $("#txtRegistro").val("Agregar");
                    $.ajax({
                        type: 'POST',
                        url: "GuardarVentas.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }
                    });
                });
                $("#btnIniciar").click(function () {
                    $("#txtRegistro").val("Iniciar");
                    $.ajax({
                        type: 'POST',
                        url: "GuardarVentas.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }

                    });
                });
                $("#btnComprar").click(function () {
                    $("#txtRegistro").val("Comprar");
                    $.ajax({
                        type: 'POST',
                        url: "GuardarVentas.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#respuesta").html(data);
                        }

                    });
                });
            });
        </script>

        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form id="formu">
                            <table class="table">
                                <tr>
                                    <td>Agregar Venta</td>    
                                </tr>
                                <tr>
                                    <td>Producto</td>
                                    <td>
                                        <select name="cboProd">
                                            <?php
                                            $conexion = new mysqli("localhost", "root", "", "servidoycomido");

                                            $cons = $conexion->query("select * from producto;");
                                            while ($row = mysqli_fetch_array($cons)) {
                                                ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " - $" . $row[3]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    
                                    </td>
                                    <td>Cantidad</td>
                                    <td><input type="number" min="1" value="1" name="txtCantidad"></td>
                                </tr>
                                
                                <tr>
                                    <td>Tipo de entraga</td>
                                    <td>
                                        <select name="cboEnt">
                                            <option value="Mesa">Mesa</option>
                                            <option value="Barra">Barra</option>
                                        </select>
                                    </td>
                                    
                                    <td>Entregado por </td>
                                    <td>
                                        <select name="cboEmp" >
                                                <?php
                                                $sql = $conexion->query("select * from empleado where CARGO_idCargo = 4;");

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

                                    <td> <input type="button" value="Iniciar" id="btnIniciar"/></td>
                                    <td> <input type="button" value="Agregar" id="btnAgregar"/></td>
                                    <td><input type="button" value="Comprar" id="btnComprar"/></td>
                                </tr>

                            </table>
                            <input type="hidden" name="txtRegistro" id="txtRegistro">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div id="respuesta">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
