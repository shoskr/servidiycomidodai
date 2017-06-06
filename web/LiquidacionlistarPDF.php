<?php

if (isset($_POST["txtAccion"])) {
    $conexion = new mysqli("localhost", "root", "", "servidoycomido");

    $accion = $_POST["txtAccion"];


    if ($accion == "Listar") {


        $rutli = $_POST["cboEmp"];

        $sql = "select * from liquidacion where EMPLEADO_rut='$rutli';";

        $resp = $conexion->query($sql);

        $sql1 = "select * from empleado where rut='$rutli';";
        $resp1 = $conexion->query($sql1);


       
        echo '<table class="table ">';
        echo '<tr>';
        echo '<td colspan="4">Liquidacion de sueldo</td>';
        echo '</tr>';
//lista la tabla        
        $des;
        while ($row = mysqli_fetch_array($resp1)) {

            echo '<tr>';
            echo '<td ">Nombre</td>';
            echo '<td> ' . $row[1] . ' ' . $row[2] . '</td>';
            echo '<td>Rut Empleado</td>';
            echo '<td>' . $row[0] . '</td>';
            echo '</tr>';
        }
        while ($row = mysqli_fetch_array($resp)) {
            echo '<tr>';
            echo '<td>Periodo</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Dias Trabajado</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>Total Horas Extras</td>';
            echo '<td>' . $row[13] . '</td>';
            echo '</tr>';


            echo '<tr>';
            echo '<td>Sueldo</td>';
            echo '<td>' . $row[12] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Horas Extras</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Aguinaldo</td>';
            echo '<td>' . $row[5] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Bonos</td>';
            echo '<td>' . $row[4] . '</td>';
            echo '<td></td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Gratificacion</td>';
            echo '<td>' . $row[10] . '</td>';
            echo '</tr>';


            echo '<tr>';
            echo '<td>Total Haberes</td>';
            echo '<td>' . $row[14] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td></td>';
            echo '<td>Fonasa </td>';
            echo '<td>' . $row[6] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Afp</td>';
            echo '<td></td>';
            echo '<td>' . $row[7] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Seguro Cesantia</td>';
            echo '<td></td>';
            echo '<td>' . $row[8] . '</td>';
            echo '</tr>';

            $des = $row[6] + $row[7] + $row[8];
            echo '<tr>';
            echo '<td>Total descuento</td>';
            echo '<td></td>';
            echo '<td>' . $des . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>Alcance Liquido</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td>' . $row[11] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
//redirecciona a la page del pdf
    }
    return;
}