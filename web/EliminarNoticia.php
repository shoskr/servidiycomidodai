<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$sql = "select * from noticia;";

$total = mysqli_num_rows($conexion->query($sql));


for ($index = 0; $index < 100; $index++) {
    if (isset($_POST['E' . $index])) {
        $query="select idNoticias from noticia where idNoticias = ".$index.";";
        $objeto = mysqli_fetch_array($conexion->query($query));
        echo $objeto['idPromocion'];
        $conexion->query("delete from noticia where idNoticias = ".$objeto['idNoticias'].";");
        header('Location: Noticias.php');
    }
}
