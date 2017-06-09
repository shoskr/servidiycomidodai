<?php
ob_start();
$conexion = new mysqli("localhost", "root", "", "servidoycomido");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>

        <?php
        $rutli = $_GET["id"];

        $sql = "select * from liquidacion where EMPLEADO_rut='$rutli';";

        $resp = $conexion->query($sql);

        $sql1 = "select * from empleado where rut='$rutli';";
        $resp1 = $conexion->query($sql1);
        ?>



        <p colspan="4" style="text-align: center; font-size: x-large"><b>Liquidacion de sueldo</b></p>
        <p></p>
        <p></p>

        <?php
        $des;
        while ($row = mysqli_fetch_array($resp1)) {
            ?>
            <table>  
                <tr>

                    <td>Nombre</td>
                    <td> <?php echo $row[1] . ' ' . $row[2] ?> </td>
                    <td></td>
                    <td>Rut Empleado</td>
                    <td><?php echo $row[0] ?></td>
                </tr>
                <?php
            }

            while ($row = mysqli_fetch_array($resp)) {
                ?>
                <tr>
                    <td>Periodo</td>
                    <td><?php echo $row[1] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Dias Trabajado</td>
                    <td><?php echo $row[2] ?></td>
                    <td></td>
                    <td>Total Horas Extras</td>
                    <td><?php echo $row[13] ?></td>
                </tr>


                <tr>
                    <td>Sueldo</td>
                    <td><?php echo $row[12] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Horas Extras</td>
                    <td><?php echo $row[3] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Aguinaldo</td>
                    <td><?php echo $row[5] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Bonos</td>
                    <td><?php echo $row[4] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Gratificacion</td>
                    <td><?php echo $row[10] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>


                <tr>
                    <td>Total Haberes</td>
                    <td><?php echo $row[14] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Fonasa </td>
                    <td></td>
                    <td></td>
                    <td><?php echo $row[6] ?></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>Afp</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $row[7] ?></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Seguro Cesantia</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $row[8] ?></td>
                    <td></td>
                </tr>
                <?php
                $des = $row[6] + $row[7] + $row[8];
                ?>
                <tr>
                    <td>Total descuento</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $des ?></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Alcance Liquido</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $row[11] ?></td>
                </tr>
            <?php }
            ?>
        </table>

        <p><b>Recibi Conforme ___________________________________</b></p>


    </body>
</html>
<?php
require_once '../dompdf/dompdf_config.inc.php';
$dompdf = new DOMPDF();
$dompdf->load_html(utf8_decode(ob_get_clean()));
$dompdf->render();
$dompdf->set_paper('A5', 'portrait');
$pdf = $dompdf->output();
$filname = "Liquidacion.pdf";
$dompdf->stream($filname, array("Attachment" => 0));
?>