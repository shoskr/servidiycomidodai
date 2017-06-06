
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
            <div class="col-md-offset-3 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">

                        <form>
                            <table clase="table">
                                <tr>
                                    <td>Ventas </td>
                                    <td> 
                                        <select name="cboVenta">
                                            <option>Seleccione Venta</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>

                                                <option value="<?php echo $row[0]; ?>"><?php echo 'Venta N° '.$row[0].' Con Fecha '. $row[1]; ?></option>

                                            <?php } ?>    
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> </td>
                                </tr>
                            </table>
                        </form>    

                        <?php
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
