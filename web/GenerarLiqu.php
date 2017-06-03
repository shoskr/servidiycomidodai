<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");


$rut = $_POST["cboEmp"];
$periodo = $_POST["cboPeriodo"];
$ausencias = $_POST["txtAusencias"];
$lic = $_POST["txtLicencias"];
$Bono = $_POST["txtBonos"];
$agisnaldo = $_POST["txtAgisnaldo"];



//dias trabajados
$dtrab = (30 - $ausencias - $lic);

$sql = $conexion->query("SELECT * from empleado;");
$sb;
$sd;
$fp;


//obtener valores
while ($row = mysqli_fetch_row($sql)) {
    if ($row[0] == $rut) {
        $ss = $row[5];
        $sb = round(($row[5] / 30) * $dtrab);
        $fp = $row[9];       
    }
}

//valor de hora extra
$valorH = round(((($ss / 30) * 7) / 45) * 1.5);

//obtener porcentaje afp
$mysql = $conexion->query("SELECT * from afp;");
while ($row = mysqli_fetch_row($mysql)) {
    if($row[0] == $fp){
        $porcentaje = $row[2];
    }
}

//obtener horas extras
$hrs = $conexion->query("call hex('$rut','$periodo');");
$he;
while ($row1 = mysqli_fetch_row($hrs)) {
    $he = $row1[0];
}
$ch = ($he - 28800) / 3600;
if($ch>0){
    $the = $valorH * $ch;
}else{
    $the = round((($ss / 30) * 7) / 45);
}



//calcular gratificacion
$tgrat = ($sb + $the + $Bono + $agisnaldo) * 0.25;
if ($tgrat >= 104500) {
    $grat = 104500;
} else {
    $grat = $tgrat;
}

//obtener haber
$haber = $sb + $the + $Bono + $agisnaldo + $grat;
//afp
$Tafp = round($haber * $porcentaje/100);
//salud
$salud = round($haber * 0.07);
//cesantia
$cesantia = round($haber * 0.006);

//liquido
$liq = $haber - ($salud + $cesantia+$Tafp);

//guardar liquidacion
$con = new mysqli("localhost", "root", "", "servidoycomido");
$query = "CALL LIQUIDACION('$periodo', $dtrab, $the, $Bono, $agisnaldo, $salud, $Tafp,$cesantia, '$rut', $grat, $liq, $sb,$ch, $haber);";

$res = $con->query($query);

if($res > 0){
    echo 'grabo';
}else{
    echo 'no grabo';
}