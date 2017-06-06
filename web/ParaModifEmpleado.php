<?php


$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$rut = $_POST["cboEmp"];
$act = $_POST["cboAtivado"];


$sql = "update empleado set estado = $act where rut = '$rut';";


$res= $conexion->query($sql);

if($res>0){
    header("location:ModificarEmpleado.php");
}

