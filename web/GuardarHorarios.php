<?php
$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$rut =$_POST["cboEmp"];
$arreglo_dias = $_POST["Dia"];
$inicio = $_POST["FechaInicio"];
$fin = $_POST["FechaTermino"];
$Turno = $_POST["Turno"];
$dias ="";

foreach ($arreglo_dias as $key => $value) {
    $dias = $dias . $value .", ";    
}

$sql = "call HACERHORARIO('$rut', '$dias', '$inicio', '$fin', '$Turno');";

$resp = $conexion->query($sql);

if($resp>0){
    echo $rut.$dias. $inicio. $fin. $Turno. $local;
    header("location:IngresarHorarios.php");
}else{
    echo $resp;
    echo $rut.$dias. $inicio. $fin. $Turno. $local;
    echo "no guardo";
}
