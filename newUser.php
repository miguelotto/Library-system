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

    </div>






    <!--  <section class="vh-100 ">
        <div class="container py-5 h-200">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-secondary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <div class="container">
        <div class="container">
            <form action="controller/grabarNewUser.php" method="POST">
                <h1>Registrar Bibliotecario</h1>


                <div class="form-group"> <!-- Nombred -->
                    <label for="full_name_id" class="control-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="">
                </div>
                <div class="form-group"> <!--Apellidos-->
                    <label for="full_name_id" class="control-label">Contraseña</label>
                    <input type="text" class="form-control" id="contraseña" name="contraseña" placeholder="">
                </div>

                <div class="form-group"> <!-- Titulo -->
                    <etiqueta para="street1_id" class="control-label">Cedula</label>
                        <input type="text" class="form-control" id="cedula_bibliotecario" name="cedula_bibliotecario" placeholder="">
                </div>
                <br>



                <select id="status" name="status" class="form-control " aria-label=".form-select-lg example">
                    <option selected>Seleccione el status</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>

                <br>
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
<?php
}
?>