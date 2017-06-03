<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$sql = "select * from producto;";

$total = mysqli_num_rows($conexion->query($sql));


for ($index = 0; $index < 100; $index++) {
    if (isset($_POST['E' . $index])) {
        $query="select idProducto from producto where idProducto = ".$index.";";
        $objeto = mysqli_fetch_array($conexion->query($query));
        echo $objeto['idPromocion'];
        $conexion->query("delete from producto where idProducto = ".$objeto['idProducto'].";");
        header('Location: producto.php');
    }
}

