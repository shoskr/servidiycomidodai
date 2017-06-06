<?php
$nomb=$_POST["txtNombrePr"];
$des=$_POST["txtDesc"];
$feIni=$_POST["fechaIn"];
$feTero=$_POST["FechaTermino"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nom=$_FILES["filFoto"]["name"];
$conexion=new mysqli("localhost", "root","","servidoycomido");


//copiar la foto en la carpeta img
if (copy($archivo,"../imgPromocion/".$nom)) {
    $sql="insert into promocion values(null,'$des','$nomb','$feTero','$nom','$feIni');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
         header("location:promocion.php");
    } else {
        echo 'No Grabo';
    }
} else {
    echo "no se puede cargar la foto";
}
