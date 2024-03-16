<?php
session_start();
include_once('../models/conexion.php');

$user = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sentencia = $bd->prepare("SELECT id,nombre_usuario, contraseña FROM bibliotecario WHERE nombre_usuario=? and contraseña =? ");

$sentencia->execute([$user, $contraseña]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);


if ($datos == True) {
    $_SESSION['usuario'] = $datos->nombre_usuario;
    $_SESSION['contraseña'] = $datos->contraseña;
    $_SESSION['id'] = $datos->id;
?> <script>
        alert("iniciando sesion");
        location.href = "../index.php";
    </script>
<?php

} elseif ($datos == False) {
?>
    <script>
        alert("Nombre o contraseña incorrectos, intente de nuevo");
        location.href = "../login.php";
    </script>
<?php

}
