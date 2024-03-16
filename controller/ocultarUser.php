<?php
require_once('../models/conexion.php');

$id = $_GET['id'];

$sentencia = $bd->prepare("UPDATE bibliotecario SET status='Inactivo' WHERE id=?");
$resultado =   $sentencia->execute([$id]);



?>
<script>
    location.href = "../gestionarUser.php"
</script>