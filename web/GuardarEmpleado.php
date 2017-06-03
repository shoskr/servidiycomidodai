<?php
$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$rut = $_POST["txtRut"];
$nombre = $_POST["txtNombre"];
$app = $_POST["txtApp"];
$apm = $_POST["txtApm"];
$edad = $_POST["txtEdad"];        
$sueldo = $_POST["txtSueldo"];
$CV = $_FILES["filDoc"]["tmp_name"];
$nom =$_FILES["filDoc"]["name"];

$cargo = $_POST["cboCargo"];

if (copy($CV,"../CV/".$nom)) 
        {
    $sql="call crearEmpleado('$rut','$nombre','$app','$apm',$edad,$sueldo,'$nom',$cargo,);";
    $resp=$conexion->query($sql);
    if ($resp>0) {
        alert("Guardado");
        header("location:IngresarEmp.php");
    } else {
        echo 'No Grabo';
    }
} else {
    echo "no se puede cargar la foto";

}