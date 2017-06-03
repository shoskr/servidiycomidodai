<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$us = $_POST["txtUsu"];
$pass = $_POST["txtPass"];
$emp = $_POST["cboEmp"];

$sql = "call creausuario('$us','$pass','$emp');";

$resp = $conexion->query($sql);

echo $resp;

if($resp>0){
    header("location:IngresarUsuario.php");
}else{
    echo $resp;
    echo "no grabo";
}