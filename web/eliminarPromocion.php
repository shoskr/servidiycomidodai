<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$sql = "select * from promocion;";

$total = mysqli_num_rows($conexion->query($sql));


for ($index = 0; $index < 100; $index++) {
    if (isset($_POST['E' . $index])) {
        $query="select idPromocion from promocion where idPromocion = ".$index.";";
        $objeto = mysqli_fetch_array($conexion->query($query));
        echo $objeto['idPromocion'];
        $conexion->query("delete from promocion where idPromocion = ".$objeto['idPromocion'].";");
        header('Location: Promocion.php');
    }
}