<?php
$base_Datos = "biblioteca"; //hay que cambiar el nombre de la base de datos a usar 
$usuario = "root";
$clave = "";
$host = "localhost";

try {
    $bd = new PDO("mysql:host=$host; dbname=$base_Datos", $usuario, $clave); //es una manera mas segura de conectar?

} catch (Exception $e) {
    echo 'Error de conexion' . $e->getMessage();
}
