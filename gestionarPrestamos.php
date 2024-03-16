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

    $sentencia = $bd->query("SELECT p.id as IDP,id_lector,lectores.nombres as LNAME,codigo_libro,titulo,fecha_prestamo,fecha_devolucion,bibliotecario.nombre_usuario as BNAME FROM prestamo p JOIN lectores ON lectores.id=p.id_lector JOIN libro ON 
libro.id=p.codigo_libro JOIN bibliotecario ON p.id_bibliotecario=bibliotecario.id WHERE p.fecha_devolucion is null");

    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
    <div class="container">

        <h1 class="container">
            Listado de Prestamos
        </h1>
        <br>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Prestamo</th>
                        <th scope="col">ID Lector</th>
                        <th scope="col">Nombre Lector</th>
                        <th scope="col">Codigo Libro</th>
                        <th scope="col">Titulo del Libro</th>
                        <th scope="col">Fecha Prestamo</th>
                        <th scope="col">Fecha devolucion</th>
                        <th scope="col">Bibliotecario que lo registro</th>

                        <!--                 <th scope="col">Acciones</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $datos) { ?>
                        <tr>
                            <th scope="row"><?php echo $datos->IDP ?></th>
                            <td><?php echo $datos->id_lector ?></td>
                            <td><?php echo $datos->LNAME ?></td>
                            <td><?php echo $datos->codigo_libro ?></td>
                            <td><?php echo $datos->titulo ?></td>
                            <td><?php echo $datos->fecha_prestamo ?></td>
                            <td><?php echo $datos->fecha_devolucion ?></td>
                            <td><?php echo $datos->BNAME ?></td>
                            <!--  <td><?php echo $datos->ejemplares ?></td>
                         <td><a class="btn btn-warning" href="editarUser.php?id=<?php echo $datos->id ?>&nom=<?php echo $datos->nombre_usuario ?>">Modificar </a> || <a class="btn btn-danger" href="controller/ocultarUser.php?id=<?php echo $datos->id ?>">Eliminar</a> </td>  -->
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>

    <?php
    require_once('views/parte_inferior.php');

    ?>
<?php
}
?>