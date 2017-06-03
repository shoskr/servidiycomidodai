<?php
$nomb=$_POST["txtNombreP"];
$des=$_POST["txtDesc"];
$precio=$_POST["txtPrecio"];
$archivo=$_FILES["filFoto"]["tmp_name"];
$nom=$_FILES["filFoto"]["name"];
$conexion=new mysqli("localhost", "root","","servidoycomido");
//copiar la foto en la carpeta img
if (copy($archivo,"../imgProducto/".$nom)) {
    $sql="insert into producto values(null,'$nomb','$des',$precio,'$nom');";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        
   
        header("location:Producto.php");
    } else {
        echo 'No Grabo';
    }
} else {
    echo "no se puede cargar la foto";
}


