<?php
session_start();
if (!isset($_SESSION['usuario'])) { //seguridad :D
?> <script>
        alert("este usuario no esta autorizado");
        location.href = "login.php";
    </script>

<?php
} else {

    require_once("models/conexion.php");
    require_once("views/parte_superior.php");
    $sentencia = $bd->query("SELECT lectores.id as ID,lectores.cedula,nombres,apellidos,nombre_usuario FROM lectores JOIN bibliotecario ON lectores.id_bibliotecario=bibliotecario.id");
    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="container">
        <h1 class="container">
            Listado de Lectores
        </h1>
        <br>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Bibliotecario que lo registro</th>
                        <th>Accion</th>

                        <!--                 <th scope="col">Acciones</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $datos) { ?>
                        <tr>
                            <th scope="row"><?php echo $datos->ID ?></th>
                            <td><?php echo $datos->cedula ?></td>
                            <td><?php echo $datos->nombres ?></td>
                            <td><?php echo $datos->apellidos ?></td>
                            <td><?php echo $datos->nombre_usuario ?></td>

                            <td><a class="btn btn-warning" href="modificarLector.php?id=<?php echo $datos->ID ?>">Modificar </a> <!-- || <a class="btn btn-danger" href="controller/ocultarUser.php?id=<?php echo $datos->id ?>">Eliminar</a> </td>   -->
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>
    <?php
    require_once("views/parte_inferior.php");
    ?>
<?php } ?>