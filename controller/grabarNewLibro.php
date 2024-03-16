<?php

require_once('../models/conexion.php');

$nombreAutor = $_POST['autor_name'];
$apellidoAutor = $_POST['autor_apellido'];
$titulo = $_POST['titulo'];
$Numero = $_POST['numero'];


$sentencia = $bd->prepare("INSERT INTO `libro` ( `titulo`, `ejemplares`) VALUES ( ?, ?) ");

$resultado = $sentencia->execute([$titulo, $Numero]);

$sentencia2 = $bd->prepare("INSERT INTO `autor` (`nombres`, `apellidos`) VALUES ( ?,?)");

$sentencia2->execute([$nombreAutor, $apellidoAutor]);

//id del autor
$sentencia3 = $bd->prepare("SELECT id FROM autor WHERE nombres=? and apellidos=? ");
$sentencia3->execute([$nombreAutor, $apellidoAutor]);


$id_autor = $sentencia3->fetch(PDO::FETCH_OBJ);

//id del libro recien insertado
$sentencia4 = $bd->prepare("SELECT id FROM libro WHERE titulo=? ");
$sentencia4->execute([$titulo]);


$id_libro = $sentencia4->fetch(PDO::FETCH_OBJ);


//insercion
$sentencia5 = $bd->prepare("INSERT INTO `libro_autor` (`id_autor`, `id_libro`) VALUES (?, ?)");

$sentencia5->execute([$id_autor->id, $id_libro->id]);

?>
<script>
    location.href = "../gestionarLibroAutor.php"
</script>