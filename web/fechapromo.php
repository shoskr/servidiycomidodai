<?php

$fech = $_POST["fecha"];

$conexion = new mysqli("localhost", "root", "", "servidoycomido");
//$reg = $conexion->query("select * from promocion where fechaInicio>= $fech;");

$sql = $conexion->query("select * from promocion");

echo '<table class="table tab-pane " border="1" style="margin: 10px">';
echo '<tr>';
echo '<td>Fecha ingresada</td>';
echo '<td>Codigo</td>';
echo '<td>Nombre</td>';
echo '<td>Descripcion</td>';
echo '<td>Fecha Inicio</td>';
echo '<td>Fecha Termino</td>';
echo '<td>Imagen</td>';
echo '</tr>';

while ($row = mysqli_fetch_row($sql)) {

    if ($row[3] <= getdate()) {
        if ($row[4] >= $fech) {
          
            echo '<tr>';
            echo '<td>', $fech .'</td>';
            echo '<td>', $row[0] .'</td>';
            echo '<td>', $row[1] .'</td>';
            echo '<td>', $row[2] .'</td>';
            echo '<td>', $row[3] .'</td>';
            echo '<td>', $row[4] .'</td>';
            $f=$row[5];
           echo'<td>','<img src="../imgPromocion/'.$f.'"width="200" height="200">'.'</td>';
            echo '</tr>';
             
        } else {
            echo 'No Hay promociones activas'; 
        }
    }  
}
echo '</table>';

