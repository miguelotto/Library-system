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

    <!-- inicio del contenido principal  -->
    <h1 class="">
        Inicio
    </h1>
    <div class="row d-flex justify-content-center align-items-center h-100">

        <img src="https://cdn.icon-icons.com/icons2/37/PNG/512/bookstack_libr_3024.png" alt="libro">
    </div>


    <!-- fin del contenido principal -->



    <?php
    require_once('views/parte_inferior.php'); ?>
<?php
} ?>