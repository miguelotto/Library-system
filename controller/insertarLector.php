<?php


require_once("../models/conexion.php");

$cedulaL = $_POST['cedula'];
$Nombres = $_POST['nombres'];
$Apellidos = $_POST['apellidos'];


$sentencia = $bd->prepare("INSERT INTO `lectores` (`cedula`, `nombres`, `apellidos`, `id_bibliotecario`) VALUES (?, ?, ?, ?)");
session_start();
$sentencia->execute([$cedulaL, $Nombres, $Apellidos, $_SESSION['id']]);


?>
<script>
    location.href = "../listadoLectores.php";
</script>