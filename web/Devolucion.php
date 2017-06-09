
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './PaginaVentas.php';
        $conexion = new mysqli("localhost", "root", "", "servidoycomido");

        $sql = $conexion->query("select * from venta;");
        ?>

        <div class=" row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div>
                            <form method="post" action="DevolucionDetalle.php">
                                <table class="table">
                                    <tr>
                                        <td>Ventas </td>
                                        <td> </td>
                                        <td> 
                                            <select name="cboVenta">
                                                <?php
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    ?>

                                                    <option value="<?php echo $row[0]; ?>"><?php echo 'Venta N° ' . $row[0] . ' Con Fecha ' . $row[1]; ?></option>

                                                <?php } ?>    
                                            </select>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"> <input type="submit" id="btnBuscarr" value="Detalle"/></td>
                                    </tr>
                                    <input type="hidden" id="txtAccion" name="txtAccion">
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
