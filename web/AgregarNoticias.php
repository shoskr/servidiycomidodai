<?php
$conexion = new mysqli("localhost", "root", "", "servidoycomido");
$nomb=$_POST["txtNombreN"];
$des=$_POST["txtDesc"];
$fech=$_POST["Fecha"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nom=$_FILES["filFoto"]["name"];

//copiar la foto en la carpeta img
if (copy($archivo,"../imgNoticias/".$nom)) {
    $sql="insert into noticia values(null,'$nomb','$des','$fech','$nom');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        echo ' Grabo';
    } else {
        echo 'No Grabo';
    }
} else {
    echo "no se puede cargar la foto";
}

