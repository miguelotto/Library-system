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

    $sentencia = $bd->query("SELECT autor.id as idA,nombres,apellidos,libro.id as idL,titulo,ejemplares FROM autor JOIN  libro_autor ON libro_autor.id_autor=autor.id JOIN libro ON libro.id=libro_autor.id_libro");

    $libros = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>


    <!-- inicio del contenido principal  -->
    <h1 class="container">
        Gestionar libros y autores
    </h1>
    <br>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id Autor</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">id Libro</th>
                    <th scope="col">titulo</th>
                    <th scope="col">Ejemplares</th>
                    <!--                 <th scope="col">Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $datos) { ?>
                    <tr>
                        <th scope="row"><?php echo $datos->idA ?></th>
                        <td><?php echo $datos->nombres ?></td>
                        <td><?php echo $datos->apellidos ?></td>
                        <td><?php echo $datos->idL ?></td>
                        <td><?php echo $datos->titulo ?></td>
                        <td><?php echo $datos->ejemplares ?></td>
                        <!-- <td><a class="btn btn-warning" href="editarUser.php?id=<?php echo $datos->id ?>&nom=<?php echo $datos->nombre_usuario ?>">Modificar </a> || <a class="btn btn-danger" href="controller/ocultarUser.php?id=<?php echo $datos->id ?>">Eliminar</a> </td> -->
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>

    <?php
    require_once('views/parte_inferior.php');

    ?>
<?php
} ?>