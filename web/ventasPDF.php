<?php

if (isset($_POST["txtRegistro"])) {

    $conexion = new mysqli("localhost", "root", "", "servidoycomido");


    $archi = $_POST["txtRegistro"];

    if ($archi == "Listar") {

        $inicio = $_POST["FechaIni"];
        $final = $_POST["FechaTer"];



        $sql = "select * from venta where fechaVentas >='$inicio' and fechaVentas <= '$final'; ";

        $resp = $conexion->query($sql);

        echo '<table class="table table-bordered">';
        echo '<tr>';
        $archivo = fopen("ventas.csv", "w");
        fwrite($archivo, "Folio;Fecha Venta; Total;Rut Empleado \n");
        echo '<td>Folio</td>';
        echo '<td>Fecha Venta</td>';
        echo '<td>Total</td>';
        echo '<td>Rut Empleado</td>';
        echo '</tr>';
        while ($row = mysqli_fetch_array($resp)) {
            echo '<tr>';
            fwrite($archivo, $row[0] . ";" . $row[1] . ";" . $row[2] . ";" . $row[3] . "\n");
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td>' . $row[3] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        fclose($archivo);
        echo '<a href="PDFVentas.php">Vista PDF</a>';
    }
    return;
}
    


   
        
        
        
