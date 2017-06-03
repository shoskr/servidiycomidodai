<?php

$conexion = new mysqli("localhost", "root", "", "servidoycomido");

$usu = $_POST['txtUsuario'];
$pass = $_POST['txtPass'];


$tipo;
$emp;


$sql = "select * from usuario where nombreUsuario ='$usu' and password = '$pass';";

$resp = $conexion->query($sql);




if ($resp->num_rows > 0) {
    $nomre;
    while ($row = mysqli_fetch_array($resp)) {
        $emp = $row[3];
    }
    $sql = $conexion->query("select * from empleado where rut = '$emp'");

    while ($row = mysqli_fetch_array($sql)) {
        if ($emp = $row[0]) {
            $tipo = $row[7];
            $nomre = $row[1] . ' ' . $row[2];
            $estado = $row[8];
        }
    }
    if ($estado = 1) {
        switch ($tipo) {
            case 1:
                session_start();
                $_SESSION['user'] = $nomre;
                $_SESSION['user1'] = $emp;
                header("location:PaginaAdministrador.php");
                break;
            case 2:
                session_start();
                $_SESSION['user'] = $nomre;
                $_SESSION['user1'] = $emp;
                header("location:PaginaVentas.php");
                break;
            case 5:
                session_start();
                $_SESSION['user'] = $nomre;
                $_SESSION['user1'] = $emp;
                header("location:PaginaContador.php");
                break;
        }
    } else {
        echo "sin acceso";
    }
} else {
    echo 'contraseña o clave incorrecta';
}
 