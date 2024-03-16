<?php
session_start();
if (!isset($_SESSION['usuario'])) { //seguridad :D
?> <script>
        alert("este usuario no esta autorizado");
        location.href = "login.php";
    </script>

<?php
} else {
    require_once('models/conexion.php');


    require_once('views/parte_superior.php');
    $id = $_GET['id'];
    $sentencia = $bd->prepare("SELECT id,cedula,nombres,apellidos FROM lectores WHERE id =?");
    $sentencia->execute([$id]);
    $datos = $sentencia->fetch(PDO::FETCH_OBJ);
?>

    <div class="container">

        <div class="container">
            <form action="controller/updateLector.php?id=<?php echo $id ?>" method="POST">
                <h1>Modificar Lector</h1>


                <div class="form-group"> <!-- Nombred -->
                    <label for="full_name_id" class="control-label">Cedula del Lector</label>
                    <input value="<?php echo $datos->cedula ?>" type="text" class="form-control" id="cedula-lector" name="cedula-lector" placeholder="">
                </div>
                <div class="form-group"> <!--Apellidos-->
                    <label for="full_name_id" class="control-label">Nombres</label>
                    <input value="<?php echo $datos->nombres ?>" type="text" class="form-control" id="nombres" name="nombres" placeholder="">
                </div>
                <div class="form-group"> <!--Apellidos-->
                    <label for="full_name_id" class="control-label">Apellidos</label>
                    <input value="<?php echo $datos->apellidos ?>" type="text" class="form-control" id="apellidos" name="apellidos" placeholder="">
                </div>

                <br>
                <div clase="form-group"> <!-- Botón Enviar -->
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </div>
            </form>


        </div>
    </div>

    <?php
    require_once('views/parte_inferior.php');
    ?>
<?php } ?>