<?php

if (isset($_POST["txtRegistro"])) {


    $conexion = new mysqli("localhost", "root", "", "servidoycomido");
    ini_set('date.timezone', 'America/santiago');
    
    
    $rut = $_POST["cboEmp"];
    $fecha = date("m-y");
    



    $registro = $_POST["txtRegistro"];


    IF ($registro == "ENTRADA") {


       $sql = $conexion->query("call ENTRADA('$fecha','$rut');");

        IF ($sql > 0) {
            echo '<p> Servido Y Comido</p>';
            echo '<p> Entrada</p>';
            echo '<p>' . date("g:i A") . '</p>';
            echo '<p>ID = ' . $rut . '</p>';
        } else {
            echo '<p> no entras</p>';
        }
    }

    if ($registro == "SALIDA") {

        $val = 0;
        $sql1 = $conexion->query("select * from reg_entrada_salida where empleado_rut = '$rut' ;");

        while ($row = mysqli_fetch_array($sql1)) {

            $val = $row[0];
        }

        $sql = $conexion->query("call SALIDA($val);");


        IF ($sql > 0) {
            echo '<p> Servido Y Comido</p>';
            echo '<p>      Salida     </p>';
            echo '<p>  '.date("g:i A").'  </p>';
            echo '<p>ID = ' . $rut . '</p>';
        } else {
            echo '<p>     No entras       </p>';
        }
    }


    return;
}
      
    

