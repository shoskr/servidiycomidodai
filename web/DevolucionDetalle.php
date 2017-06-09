
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './PaginaVentas.php';
        $conexion = new mysqli("localhost", "root", "", "servidoycomido");

        $venta = $_POST["cboVenta"];

        $sql = $conexion->query("call devo($venta)");
        ?>
        <div class=" row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <div>
                           
                            <form action="GuardarDevolucion.php" method="post">
                                <table class="table">
                                    <tr>
                                        <td colspan="4" style="text-align: center">DETALLE DE VENTA</td>
                                    </tr>
                                    <tr>
                                        <td> Seleccion </td>
                                        <td> Nº Venta </td>
                                        <td> Producto </td>
                                        <td> Valor    </td>
                                        <td> Cantidad </td>
                                    </tr>
                                    <?php
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><input type="radio" name="id" value="<?php echo $row[0] ?>" /></td>
                                            <td><?php echo $row[1] ?></td>
                                            <td><?php echo $row[2] ?></td>
                                            <td><?php echo $row[3] ?></td>
                                            <td><?php echo $row[4] ?></td>

                                        </tr>

                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td> Motivo Devolucion </td>
                                        <td colspan="3"> <textarea name="txtDetalle" rows="2" cols="20"></textarea> </td>      
                                    </tr>
                                    <tr>
                                        <td>Cantidad de productos devuelto</td>
                                        <td colspan="3"><input type="number" name="txtCantidad" value="" /></td>
                                    <tr>
                                        <td><input type="submit" id="btnGuardar" value="Devoluciones"/></td>
                                        <td colspan="2"><a href="Devolucion.php"><b>Cancelar Devolucion</b></a></td>
                                    <tr>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>

