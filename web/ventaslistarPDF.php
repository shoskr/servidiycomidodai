<?php

if (isset($_POST["txtVent"])) {

    echo 'asas';
    $conexion = new mysqli("localhost", "root", "", "servidoycomido");

    $accionV = $_POST["txtVent"];

    if ($accionV == "Listar") {

        $inicio = $_POST["FechaIni"];
        $final = $_POST["FechaTer"];



        $sql = "select * from venta where fechaVentas >='$inicio' and fechaVentas <= '$final'; ";

        $resp = $conexion->query($sql);

        echo '<table class="table table-bordered">';
        echo '<tr>';
        echo '<td>Folio</td>';
        echo '<td>Fecha Venta</td>';
        echo '<td>Total</td>';
        echo '<td>Rut Empleado</td>';
        echo '</tr>';
        $archivo = fopen("ventas.csv", "w");      
        
        $acum = 0;
        while ($row = mysqli_fetch_array($resp)) {
            echo '<tr>';
            fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . "\n");
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '</tr>';
            
            $acum = $acum+$row[2];
        }
        echo '<tr>';
        echo '<td></td>';
        echo '<td>Total De ventas :</td>';
        echo '<td> $' . $acum . '</td>';
        echo '<td></td>';
        echo '<tr>';
        echo '</table>';
        fclose($archivo);
        echo '<a href="PDFVentas.php">Vista PDF</a>';
    }
    return;
}
        