<?php
session_start();
if (!isset($_SESSION['usuario'])) { //seguridad :D
?> <script>
        alert("este usuario no esta autorizado");
        location.href = "login.php";
    </script>

<?php
} else {
    require_once('views/parte_superior.php');
    require_once('models/conexion.php');
    $sentencia = $bd->query("SELECT id,nombre_usuario,cedula,status FROM bibliotecario WHERE status='Activo' ");
    $bibliotecarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>


    <!-- inicio del contenido principal  -->
    <h1 class="container">
        Bibliotecarios
    </h1>
    <br>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id_Bibliotecario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">status</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bibliotecarios as $datos) { ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id ?></th>
                        <td><?php echo $datos->nombre_usuario ?></td>
                        <td><?php echo $datos->cedula ?></td>
                        <td><?php echo $datos->status ?></td>
                        <td><a class="btn btn-warning" href="editarUser.php?id=<?php echo $datos->id ?>&nom=<?php echo $datos->nombre_usuario ?>">Modificar </a> || <a class="btn btn-danger" href="controller/ocultarUser.php?id=<?php echo $datos->id ?>">Eliminar</a> </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <!-- 
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> -->


    </div>


    <!-- fin del contenido principal -->



    <?php
    require_once('views/parte_inferior.php'); ?>
<?php
}
?>