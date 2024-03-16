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
        <form action="controller/registrarDevolucion.php" method="POST">
            <h1>Devoluciones</h1>


            <div class="form-group"> <!-- Nombred -->
                <label for="full_name_id" class="control-label">ID libro</label>
                <input type="text" class="form-control" id="id_libro" name="id_libro" placeholder="">
            </div>
            <div class="form-group"> <!--Apellidos-->
                <label for="full_name_id" class="control-label">Cedula del Lector</label>
                <input type="text" class="form-control" id="cedula_lector" name="cedula_lector" placeholder="">
            </div>







            <br>
            <br>
            <div clase="form-group"> <!-- Botón Enviar -->
                <button type="submit" class="btn btn-success">Aceptar</button>
            </div>



    </div>

    <?php
    require_once('views/parte_inferior.php');
    ?>
<?php
} ?>