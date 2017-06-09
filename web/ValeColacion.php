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

        $sql1 = "select * from empleado where rut='$rutli';";
        $nombre;
        $resp1 = $conexion->query($sql1);

        while ($row = mysqli_fetch_array($resp1)) {

            $nombre = $row[1] . ' ' . $row[2];
        }
        ?>
        <table>
            <tr>
                <td colspan="3"  style="text-align: center"> VALE COLACION</td>
            </tr>
            <tr>
                <td> Nombre :</td>
                <td colspan="2"><?php echo $nombre; ?></td>
                
            </tr>
            <tr>
                <td> ID Empleado :</td>
                <td ><?php echo $rutli; ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center"> SOLO VALIDO EN LOCAL </td>
                <td></td>
            </tr>

        </table>

    </body>
</html>
<?php
require_once '../dompdf/dompdf_config.inc.php';
$dompdf = new DOMPDF();
$dompdf->load_html(utf8_decode(ob_get_clean()));
$dompdf->render();
$dompdf->set_paper($paper_size, 'portrait');
$pdf = $dompdf->output();
$filname = "Liquidacion.pdf";
$dompdf->stream($filname, array("Attachment" => 0));
?>