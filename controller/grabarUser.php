<?php
require_once('../models/conexion.php');

$id = $_GET['id'];
$cedula = $_POST['cedula_bibliotecario'];
$user = $_POST['nombre_usuario'];


$sentencia = $bd->prepare("UPDATE bibliotecario set cedula=?,nombre_usuario=? where id=?");

$resultado = $sentencia->execute([$cedula, $user, $id]);



?>

<script>
    window.location.href = "../gestionarUser.php"
</script>