<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$id = $_POST["id"];
$detalle = $_POST["txtDetalle"];
$cantidad = $_POST["txtCantidad"];


$pedido = 0;
$valr = 0;
$cantP = 0;
$ven = 0;
$total = 0;
$valorT = 0;

$aql = "select * from detalle_producto where idDetalle = $id ;";

$res = $conexion->query($aql);

while ($row = mysqli_fetch_array($res)) {
    $pedido = $row[1];
    $ven = $row[2];
    $cantP = $row[3];
}

$conexion = new mysqli("localhost", "root", "", "servidoycomido");
$sql = "select * from producto where idProducto = $pedido ;";

$res1 = $conexion->query($sql);

while ($row1 = mysqli_fetch_array($res1)) {

    $valr = $row1[3];
}



 $total = $cantP - $cantidad;


 $valorT = $cantidad * $valr;
 
 


if ($total == 0) {
    
    $sql1 = $conexion->query("DELETE FROM detalle_producto WHERE idDetalle = $id ;");
    $sql2 = $conexion->query("insert into devolucion VALUES(null,'$detalle',$valorT,$id );");
    
    header("location:Devolucion.php?mensaje='se elimino el pedido numero $id de la venta folio $ven'"); 
}
if ($total > 0) {
    $sql1 = $conexion->query("update detalle_producto set cantidad = $cantidad  where idDetalle = $id ;");
    $sql2 = $conexion->query("insert into devolucion VALUES(null,'$total',$valorT, $id );");
    header("location:Devolucion.php?mensaje='se devolvieron $cantidad productos'");
} 
if($total < 0){
    header("location:Devolucion.php?mensaje=' la cantidad es mayor a la que se desea Devolver'");
}