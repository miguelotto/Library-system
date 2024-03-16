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
?>

    <div class="container">

        <div class="container">
            <form action="controller/insertarLector.php" method="POST">
                <h1>Registrar Lector</h1>


                <div class="form-group"> <!-- Nombred -->
                    <label for="full_name_id" class="control-label">Cedula del Lector</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="">
                </div>
                <div class="form-group"> <!--Apellidos-->
                    <label for="full_name_id" class="control-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="">
                </div>
                <div class="form-group"> <!--Apellidos-->
                    <label for="full_name_id" class="control-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="">
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