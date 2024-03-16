<?php
session_start();
require_once("../models/conexion.php");
$id_libro = $_POST['id_libro'];
$cedula = $_POST['cedula_lector'];

$buscarLector = $bd->prepare("SELECT id FROM lectores WHERE cedula=?");
$buscarLector->execute([$cedula]);
$resultado = $buscarLector->fetch(PDO::FETCH_OBJ);

$buscarLibro = $bd->prepare("SELECT id FROM libro WHERE id=?");
$buscarLibro->execute([$id_libro]);
$libro = $buscarLibro->fetch(PDO::FETCH_OBJ);


if ($resultado == true && $libro == true) { //falta validar si esta esta null la devolucion
    $sentencia = $bd->prepare("UPDATE prestamo SET fecha_devolucion=CURDATE() WHERE id_lector=? and codigo_libro= ? ");

    $sentencia->execute([$resultado->id, $libro->id]);


?>
    <script>
        location.href = "../listadoDevoluciones.php";
    </script>
<?php
} else {
?>
    <script>
        alert("el libro o la cedula del lector no existe, intente de nuevo");
        location.href = "../devolucion.php";
    </script>
<?php
}







?>