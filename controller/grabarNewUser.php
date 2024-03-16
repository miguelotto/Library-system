<?php
require_once("../models/conexion.php");

$usuario = $_POST['nombre_usuario'];
$contraseña = $_POST['contraseña'];
$cedula = $_POST['cedula_bibliotecario'];
$status = $_POST['status'];

$sentencia = $bd->prepare("INSERT INTO `bibliotecario` ( `nombre_usuario`, `contraseña`, `cedula`, `status`) VALUES (?, ?, ?, ?)");

$resultado = $sentencia->execute([$usuario, $contraseña, $cedula, $status]);


?>
<script>
    location.href = "../gestionarUser.php"
</script>