<?php
require_once('../models/conexion.php');
$id = $_GET['id'];
$Cedula = $_POST['cedula-lector'];
echo $Cedula;
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];


$sentencia = $bd->prepare("UPDATE lectores set cedula=?, nombres=?,apellidos=? WHERE id=?");
$sentencia->execute([$Cedula, $nombres, $apellidos, $id]);


?>
<script>
    location.href = "../listadoLectores.php";
</script>