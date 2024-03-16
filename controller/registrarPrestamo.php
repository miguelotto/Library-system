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


if ($resultado == true && $libro == true) {

    $sentencia = $bd->prepare("INSERT INTO `prestamo` (`id_lector`, `codigo_libro`, `fecha_prestamo`, `fecha_devolucion`, `id_bibliotecario`) VALUES (?, ?,CURDATE(), NULL, ?)");
    $sentencia->execute([$resultado->id, $libro->id, $_SESSION['id']]);


?>
    <script>
        location.href = "../gestionarPrestamos.php";
    </script>
<?php
} else {
?>
    <script>
        alert("el libro o la cedula del lector no existe, intente de nuevo");
        location.href = "../nuevoPrestamo.php";
    </script>
<?php
}







?>